<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\UserStoryController;
use \App\Http\Controllers\Dashboard\Admin\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

$limiter = config('fortify.limiters.login');

Route::redirect('/', '/login');

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware(array_filter([
        'guest',
        $limiter ? 'throttle:' . $limiter : null,
    ]));

// ->resource('projects', ProjectController::class);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');


Route::group(['middleware' => ['auth:sanctum', 'role:Backoffice|SuperAdmin']], function () {

    Route::name('dashboard.')->group(function () {

        // Project routes
        Route::get('/home', [ProjectController::class, 'index']);
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects_create');
        Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects_store');
        Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects_edit');
        Route::post('/projects/{project}/update', [ProjectController::class, 'update'])->name('projects_update');

        // User Stories Routes
        Route::get(
            '/projects/{project}/user_stories',
            [UserStoryController::class, 'index']
        )->name('user_stories_index');

        Route::get(
            '/projects/{project}/user_stories/create',
            [UserStoryController::class, 'create']
        )->name('user_stories_create');

        Route::get(
            '/projects/{project}/user_stories/{user_story}/edit',
            [UserStoryController::class, 'edit']
        )->name('user_stories_edit');

        Route::post(
            '/projects/{project}/user_stories/store',
            [UserStoryController::class, 'store']
        )->name('user_stories_post');

        Route::post(
            '/projects/{project}/user_stories/{user_story}',
            [UserStoryController::class, 'update']
        )->name('user_stories_update');

        // SuperAdmin only
        Route::group(['middleware' => ['role:SuperAdmin']], function () {

            Route::prefix('admin')->name('admin.')->group(function () {

                // admin users
                Route::resource('users', UserController::class);
            });
        });
    });
});
