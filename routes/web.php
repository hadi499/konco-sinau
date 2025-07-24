<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PertanyaanController;

Route::middleware('auth')->group(function () {
    Route::middleware('userAkses:teacher')->group(function () {

        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/note', [NoteController::class, 'index'])->name('note.index');
        Route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
        Route::get('/note/{note}', [NoteController::class, 'show'])->name('note.show');
        Route::post('/note/create', [NoteController::class, 'store'])->name('note.store');

        Route::get('/users', [AuthController::class, 'getAllUsers'])->name('users.index');
        Route::get('/users/{id}/edit', [AuthController::class, 'editUser'])->name('users.edit');
        Route::put('/users/{id}', [AuthController::class, 'updateUser'])->name('users.update');
        Route::delete('/users/{id}', [AuthController::class, 'deleteUser'])->name('users.delete');

        Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
        Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
        Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');

        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
        Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::post('/posts/{id}/update', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
        Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');

        Route::get('/note/{note}/edit', [NoteController::class, 'edit'])->name('note.edit');
        Route::put('/note/{note}', [NoteController::class, 'update'])->name('note.update');
        Route::delete('/note/{note}', [NoteController::class, 'destroy'])->name('note.destroy');

        Route::get('/game/create', [GameController::class, 'create'])->name('game.create');
        Route::post('/game/create', [GameController::class, 'store'])->name('game.store');
        Route::get('/game/{id}/edit', [GameController::class, 'edit'])->name('game.edit');
        Route::put('/game/{id}', [GameController::class, 'update'])->name('game.update');
        Route::delete('/game/{id}', [GameController::class, 'destroy'])->name('game.destroy');

        Route::get('/question', [PertanyaanController::class, 'index'])->name('question.index');
        Route::get('/question/create', [PertanyaanController::class, 'create'])->name('question.create');
        Route::post('/question/create', [PertanyaanController::class, 'store'])->name('question.store');
        Route::get('/questions/edit/{id}', [PertanyaanController::class, 'edit'])->name('question.edit');
        Route::post('/questions/update/{id}', [PertanyaanController::class, 'update'])->name('question.update');
        Route::delete('/questions/delete/{id}', [PertanyaanController::class, 'destroy'])->name('question.delete');
    });

    Route::get('/student/note', [NoteController::class, 'studentNote'])->name('student.note');
    Route::get('/student/note/{note}', [NoteController::class, 'showNoteStudent'])->name('student.note.show');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/join', function () {
    return view('join', ['title' => 'join']);
})->name('join');


Route::get('/seribuhari', function () {
    return view('seribuhari', ['title' => 'seribu hari app']);
})->name('seribuhari');

Route::get('/game', [GameController::class, 'index'])->name('game.index');

Route::get('/game/{id}', [GameController::class, 'show'])->name('game.show');
Route::get('/game/{id}/data', [GameController::class, 'data'])->name('game.data');
Route::post('/game/{id}/save', [GameController::class, 'save'])->name('game.save');

Route::get('/question', [PertanyaanController::class, 'index'])->name('question.index');
Route::get('/question/create', [PertanyaanController::class, 'create'])->name('question.create');
Route::post('/question/create', [PertanyaanController::class, 'store'])->name('question.store');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

// Halaman publik
Route::get('/blog', [PostController::class, 'publicIndex'])->name('public.posts.index');
Route::get('/blog/{slug}', [PostController::class, 'publicShow'])->name('public.posts.show');
