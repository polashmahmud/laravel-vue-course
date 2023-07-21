<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $user = User::find(3);

    $post = $user->posts()->create([
        'title' => 'Something',
        'body' => 'Test Body',
    ]);

    dd($post);
});


Route::resource('/posts', PostController::class)->except(['show', 'create']);




