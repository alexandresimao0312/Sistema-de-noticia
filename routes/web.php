<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\siteController;
use App\Http\Controllers\UserController;

Route::get('/',[AuthenticatedSessionController::class, 'create'])->name('login');

Route::get('/dashboard',[NewsController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    Route::middleware('auth')->group(function ()
     {
        Route::prefix('admin')->group(function(){

            Route::resource('noticia', NewsController::class)
            ->names("news")
            ->parameters(["noticia" => "news"]);
        
            Route::resource('categoria', CategoryController::class)
            ->names("categoria")
            ->parameters(["categoria" => "category"]);

            Route::get('/perfil',[UserController::class,'editUser'])->name('editUser');
        
            });
           
    });

    Route::prefix('site')->group(function(){

    Route::get('/site',[siteController::class,'index'])->name('newsSite');
    Route::get('/news/{news}/{slug}',[siteController::class,'read'])->name('newsRead');
    Route::get('/news',[siteController::class,'news'])->name('todasNews');
    Route::get('/categoria/{id}',[siteController::class,'newsCategory'])->name('newsCategory');
    Route::get('/news/buscar',[siteController::class,'buscar'])->name('buscarNews');

    });

require __DIR__.'/auth.php';
