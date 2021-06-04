<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use App\Models\UserStory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GetUserStoryRequest;
use App\Http\Requests\Api\StoreUserStoryRequest;
use App\Http\Requests\Api\UpdateUserStoryRequest;


class UserStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $project_id = $project->id;
        $user_stories = UserStory::where('project_id', $project->id)->get();
        return view('user-stories.show', compact('user_stories', 'project_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $project_id = $project->id;
        return view('user-stories.create', compact('project_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserStoryRequest $request, Project $project)
    {
        $this->authorize('create', UserStory::class);
        $data = $request->validated();
        // $data['user_id'] = $request->user()->id;
        $data['project_id'] = $project->id;
        UserStory::create($data);
        // return redirect()->route('/projects/{project}/user_stories', $data['project_id']);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserStoryRequest $request, UserStory $user_story)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
