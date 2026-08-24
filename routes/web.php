<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

Route::get('/', [AdminController::class, 'index'])->name('index');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login-process', function (Request $request) {
    $username = $request->input('username');  
    return redirect()->route('home')->with('user_logged_in', $username);
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/logout', function () {
    return redirect()->route('login');
})->name('logout');

Route::get('/add', function () {
    return view('add'); 
})->name('add');


Route::get('/abouts', function () {
    $name = "Phakhanan";
    $date = date("Y-m-d");
    return view('abouts', compact('name', 'date')); 
})->name('abouts');

Route::get('/blogs', function () {
    $blogs = \Illuminate\Support\Facades\DB::table('blogs')->orderBy('id', 'desc')->paginate(6);
    return view('blogs', compact('blogs'));
})->name('blogs');

Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('blog.delete');
Route::get('/blog/create', [AdminController::class, 'create'])->name('blog.create');
Route::post('/blog/store', [AdminController::class, 'insert'])->name('blog.store');
Route::get('/blog', [AdminController::class, 'blog'])->name('blog');
Route::get('/blog/edit/{id}', [AdminController::class, 'edit'])->name('blog.edit');
Route::put('/blog/update/{id}', [AdminController::class, 'update'])->name('blog.update');
