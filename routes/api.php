<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TolistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\task;
use App\Models\todolist;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('todolist', function () {
//     // If the Content-Type and Accept headers are set to 'application/json',
//     // this will return a JSON structure. This will be cleaned up later.
//     return todolist::all();
// });

// Route::get('todolist/{id}', function ($id) {
//     return todolist::find($id);
// });

Route::resource('todolist', TolistController::class);

Route::resource('tasks', TaskController::class);
Route::put('tasks/markdone/{id}', 'TaskController@markdone');
