<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Traits\HandleImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Dashboard\User\Create as CreateRequest;
use App\Http\Requests\Dashboard\User\Update as UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use HandleImageUpload;

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        // search params
        $search = [
            'name'     => $request->input('search.name'),
            'role'     => $request->input('search.role'),
        ];

        // user list
        $users = User::sortable(['created_at' => 'asc'])
                ->with('roles')
                ->when($search['name'], function ($query, $name) {
                    return $query->where('name', 'LIKE', "%{$name}%");
                })
                ->when($search['role'], function ($query, $role_id) {
                    return $query->whereHas('roles', function ($query) use ($role_id) {
                        $query->where("id", $role_id);
                    });
                })
                ->paginate();

        // search filters
        $roles = DB::table('acl_roles')->select('id', 'name')->get();

        return view('admin.users.index', [
            'users'       => $users,
            'roles'       => $roles,
            'search'      => $search
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $user = new User;
        $roles = Role::pluck('name')->all();
        $departments = config('leads.departments');
        return view('admin.users.upsert', [
            'user'  => $user,
            'roles' => $roles,
            'departments' => $departments
        ]);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        $roles = Role::pluck('name')->all();
        $departments = config('leads.departments');
        return view('admin.users.upsert', [
            'user' => $user,
            'roles' => $roles,
            'departments' => $departments
        ]);
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $data = $request->validated();

        // password needs to be hashed
        $data['password'] = Hash::make($data['password']);

        // handles the avatar upload
        if (isset($data['avatar'])) {
            $data['avatar'] = $this->upsertModelImage($data['avatar'], 'users');
        }

        $user = User::create($data);
        $user->syncRoles($request->input('roles'));

        Session::flash('notification', ['message' => 'Task was successful!']);
        return redirect()->route('dashboard.admin.users.index');
    }


    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();  // data is already valid in here
        $user = User::findOrFail($id);

        // if password has changed
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            // the old one
            $data['password'] = $user->password;
        }

        // the avatar has been removed
        if ($data['avatar_remove']) {
            Storage::delete($user->avatar);
            $user->avatar = null;
        }

        // handles the avatar upload
        if (isset($data['avatar'])) {
            $data['avatar'] = $this->upsertModelImage($data['avatar'], 'users', $user->avatar);
        }

        $user->update($data);
        $user->syncRoles($request->input('roles'));

        Session::flash('notification', ['message' => 'Task was successful!']);
        return redirect()->route('dashboard.admin.users.index');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if ($id === Auth::id()) {
            return response()->json(['message' => 'Impossible to delete yourself!'], 403);
        }

        User::destroy($id);

        Session::flash('notification', ['message' => 'Task was successful!']);
        return back();
    }
}
