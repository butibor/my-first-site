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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {
    return view('contact');
});

// Route::view('/contact', 'contact');
// Route::view('/valtozok', 'valtozok', $val=>'jani');



Route::get('/valtozok', function () {
    $val='Siti';
    return view('valtozok', [
        'val' => $val
    ]);
});

Route::get('/pass-array', function () {

    $tasks = [
    'Go to the store',
    'Go to the market',
    'Go to the work'
    ];

    //   return view('tasks-list', [

    //     'tasks' => $tasks

    //   ]);

    // });
    //return view('tasklist')->withTasks($tasks);
    $foobar = 'foobar';
    return view('tasks-list')->with([
        'foo' => $foobar,
        'tasks' => $tasks
        ]);
    });


    // Route::get('/posts/{post}', function ($post) {
    //     return view('post', [
    //     'post' => $post
    //     ]);

    //     });

        Route::get('/posts/{post}', function ($post) {

            $posts = [
            'first-post' => 'Hello, this is my first blog post!',
            'second-post' => 'Now I am getting the hang of this blogging thing'
            ];
            if ( ! array_key_exists($post, $posts)) {

                abort(404);

                }
            return view('post', [

            'post' => $posts[$post] ?? 'Nothing here yet.'

                ]);
            });




    Route::get('/request-test', function () {

        return view('request-inputs', [
        'title' => request('title'),
        ]);

        });
