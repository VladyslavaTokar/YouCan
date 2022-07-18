<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','App\Http\Controllers\PagesController@index');
Route::get('/about','App\Http\Controllers\PagesController@about');
Route::get('/services','App\Http\Controllers\PagesController@services');
Route::get('/dashboard','App\Http\Controllers\PagesController@dashboard');

Route::get('/tasks', 'App\Http\Controllers\TaskController@index');
Route::post('/task', 'App\Http\Controllers\TaskController@store');
Route::delete('/task/{task}', 'App\Http\Controllers\TaskController@destroy');


Route::post('/dashboard','App\Http\Controllers\PagesController@dashboard');


Route::get('dashboard', function () {
    return view('pages.dashboard');
})->middleware('auth');

Route::post('dashboard', function () {
    return view('pages.dashboard');
})->middleware('auth');

Route::get('todo', function () {
    return view('pages.todo');
})->middleware('auth');

Route::get('tasks', function () {
    return view('pages.tasks');
})->middleware('auth');

Route::get('pomodoro', function () {
    return view('pages.pomodoro');
})->middleware('auth');

Route::get('habits', function () {
    return view('pages.habits');
})->middleware('auth');

Route::get('challenges', function () {
    return view('pages.challenges');
})->middleware('auth');

Route::get('settings', function () {
    return view('pages.settings');
})->middleware('auth');


Route::get('show', function () {
    return view('pages.show');
})->middleware('auth');

Route::get('friends', function () {
    return view('pages.friends');
})->middleware('auth');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/item', [App\Http\Controllers\ItemController::class, 'index'])->name('item');

Route::resource('checklist','App\Http\Controllers\ChecklistsController');
Route::get('/checklist', [App\Http\Controllers\ChecklistsController::class, 'index']);
Route::get('/create', [App\Http\Controllers\ChecklistsController::class, 'create']);
Route::post('/store', [App\Http\Controllers\ChecklistsController::class, 'store']);
Route::get('/store', [App\Http\Controllers\ChecklistsController::class, 'store']);
Route::get('/{id}/done', [App\Http\Controllers\ChecklistsController::class, 'done']);
Route::get('/{id}/exterminate', [App\Http\Controllers\ChecklistsController::class, 'exterminate']);
Route::get('/{id}/rename', [App\Http\Controllers\ChecklistsController::class, 'rename']);
Route::get('/count', [App\Http\Controllers\ChecklistsController::class, 'count']);
Route::patch('/edittodo/{id}', [App\Http\Controllers\ChecklistsController::class, 'update']);

Route::resource('habit','App\Http\Controllers\RoutineController');

Route::get('/habits', [App\Http\Controllers\RoutineController::class, 'index']);
Route::get('/create', [App\Http\Controllers\RoutineController::class, 'create']);
Route::post('/store', [App\Http\Controllers\RoutineController::class, 'store']);
Route::get('/{id}/trash', [App\Http\Controllers\RoutineController::class, 'trash']);
Route::get('/{id}/reset', [App\Http\Controllers\RoutineController::class, 'reset']);
Route::get('/{id}/change', [App\Http\Controllers\RoutineController::class, 'change']);
Route::patch('/{id}/update_habit', [App\Http\Controllers\RoutineController::class, 'update_habit'])->name("update_habit");

Route::get('/{id}/done_one', [App\Http\Controllers\RoutineController::class, 'done_one']);
Route::get('/{id}/done_two', [App\Http\Controllers\RoutineController::class, 'done_two']);
Route::get('/{id}/done_three', [App\Http\Controllers\RoutineController::class, 'done_three']);
Route::get('/{id}/done_four', [App\Http\Controllers\RoutineController::class, 'done_four']);
Route::get('/{id}/done_five', [App\Http\Controllers\RoutineController::class, 'done_five']);
Route::get('/{id}/done_six', [App\Http\Controllers\RoutineController::class, 'done_six']);
Route::get('/{id}/done_seven', [App\Http\Controllers\RoutineController::class, 'done_seven']);

Route::get('checklists', function () {
    return view('pages.checklists');
})->middleware('auth');


Route::get('checklist_show', function () {
    return view('pages.checklist_show');
})->middleware('auth');

Route::get('/tasks',  [App\Http\Controllers\TaskController::class, 'index']);
Route::post('/task',  [App\Http\Controllers\TaskController::class, 'store']);
Route::get('/{id}/delete', [App\Http\Controllers\TaskController::class, 'delete']);
Route::get('/{id}/sub', [App\Http\Controllers\TaskController::class, 'sub']);

Route::get('/{id}/edit', [App\Http\Controllers\TaskController::class, 'edit']);
Route::patch('/editask/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('edittask');
Route::get('/{id}/completed', [App\Http\Controllers\TaskController::class, 'completed']);

Route::get('/dashboard_show', [App\Http\Controllers\TaskController::class, 'dashboard_show'])->name('dashboard_show');

Route::patch('/editsubtask/{id}', [App\Http\Controllers\TaskController::class, 'subupdate'])->name('editsubtask');
Route::get('/{id}/subedit', [App\Http\Controllers\TaskController::class, 'subedit']);
Route::get('/{id}/subdelete', [App\Http\Controllers\TaskController::class, 'subdelete']);
Route::get('/{id}/completedsub', [App\Http\Controllers\TaskController::class, 'completedsub']);


Route::resource('task','App\Http\Controllers\TaskController');
Route::patch('/{id}/update', [App\Http\Controllers\TaskController::class, 'update']);
Route::get('/tasks/{id}', [App\Http\Controllers\TaskController::class,'show']);
Route::post('/savesubitem/{id}', [App\Http\Controllers\TaskController::class, 'savesubitem']);
Route::resource('subitem', \App\Http\Controllers\SubitemController::class);


Route::get('/profile/edit-profile',  [App\Http\Controllers\UserController::class, 'edituser'])->name('edituser');
Route::put('/profile/edit-profile',  [App\Http\Controllers\UserController::class, 'updateuser'])->name('updateuser');
Route::get('/search',  [App\Http\Controllers\UserController::class, 'search'])->name('search');


Route::group(['middleware'=>'auth'], function(){
    Route::group(['middleware'=>'is_admin'], function(){
        Route::post('/post', [App\Http\Controllers\Admin\PostsController::class, 'store']);
        Route::get('/create', [App\Http\Controllers\Admin\PostsController::class, 'create']);
        Route::get('/posts',  [App\Http\Controllers\Admin\PostsController::class, 'index']);
        Route::get('/{id}/destroy', [App\Http\Controllers\Admin\PostsController::class, 'destroy']);
        Route::get('/{id}/editpost', [App\Http\Controllers\Admin\PostsController::class, 'editpost']);
        Route::patch('/updatepost/{id}', [App\Http\Controllers\Admin\PostsController::class, 'updatepost'])->name('updatepost');
    });
    Route::get('/posts/{id}', [App\Http\Controllers\Admin\PostsController::class,'postshow'])->name('postshow');
    Route::get('/posts',  [App\Http\Controllers\Admin\PostsController::class, 'index']);
    Route::get('/{id}/showpost', [App\Http\Controllers\PostsController::class, 'showpost']);

    Route::post('/savesubitem/{id}', [App\Http\Controllers\TaskController::class, 'savesubitem']);
    Route::post('comment/{id}', [App\Http\Controllers\CommentController::class, 'store'])->name("comments");
    Route::get('/{id}/commentdelete', [App\Http\Controllers\CommentController::class, 'commentdelete']);
});


Route::get('/tasks',  [App\Http\Controllers\TaskController::class, 'index']);
Route::post('/task',  [App\Http\Controllers\TaskController::class, 'store']);
Route::get('/{id}/delete', [App\Http\Controllers\TaskController::class, 'delete']);
Route::get('/{id}/sub', [App\Http\Controllers\TaskController::class, 'sub']);

Route::get('/{id}/edit', [App\Http\Controllers\TaskController::class, 'edit']);
Route::patch('/editask/{id}', [App\Http\Controllers\TaskController::class, 'update'])->name('edittask');
Route::get('/{id}/showfriend', [App\Http\Controllers\FriendController::class, 'showfriend']);
Route::post('/friend', [App\Http\Controllers\FriendController::class, 'addfriend']);
Route::get('/addfriend{id}', [App\Http\Controllers\FriendController::class, 'addfriend']); 
Route::get('/deletefriend{id}', [App\Http\Controllers\FriendController::class, 'deletefriend']);
Route::get('/deleterequestfriend{id}', [App\Http\Controllers\FriendController::class, 'deleterequestfriend']);
Route::get('/{id}/accept', [App\Http\Controllers\FriendController::class, 'accept']);