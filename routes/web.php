<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register'  => false,
    'reset'     => false,
    'verify'    => false,
]);


/** Website Routes */
Route::get('/', function () {
    return view('website.index');
})->name('home');

Route::get('/blog', [\App\Http\Controllers\Website\BlogController::class, 'index']);
Route::get('/blog/{blog:slug}', [\App\Http\Controllers\Website\BlogController::class, 'show']);
Route::get('/what-our-customers-say-about-us', [\App\Http\Controllers\Website\TestimonialController::class, 'index']);


/** Admin Routes */
Route::group([
    'as'         => 'admin.',
    'middleware' => 'auth',
    'prefix'     => 'admin',
], function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');
    Route::resource('blog', \App\Http\Controllers\Admin\BlogController::class)->only([
        'create',
        'edit',
        'index',
        'update',
        'store'
    ]);

    Route::resource('testimonial', TestimonialController::class)->except(['destroy', 'show']);

    //when I first made testimonials, I had a brain-fart and thought they were linked to blog posts. My original work now lives on in total shame as "comments" :D
    Route::get('/comments/{blog}/create', [CommentController::class, 'create'])->name('comments.create');
    Route::get('/comments/{blog}', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/{blog}/{comment}', [CommentController::class, 'edit'])->name('comments.edit');
    Route::patch('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
});
