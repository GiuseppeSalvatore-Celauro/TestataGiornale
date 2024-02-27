<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\WriterController;

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
// Rotta per home
Route::get('/', [PublicController::class, 'home'])->name('home');

// Rotte articoli
Route::get('/article/search', [PublicController::class, 'search'])->name('article.search');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/article/categoryIndex/{category}', [ArticleController::class, 'categoryIndex'])->name('article.categoryIndex');
Route::get('/article/personalIndex/{user}', [ArticleController::class, 'personalIndex'])->name('article.personalIndex');

// Rotta per lavora con noi
Route::get('/workwithus', [PublicController::class, 'WorkWithUs'])->middleware('auth')->name('work.WorkWithUs');
Route::post('/work/send/data', [PublicController::class, 'sendRequest'])->middleware('auth')->name('workWithUs');

//rotte admin

Route::middleware('AdminMiddleware')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'tables'])->name('admin.tables');
    Route::get('/admin/{user}/setAdmin', [AdminController::class, 'setAdmin'])->name('adminCheck');
    Route::get('/admin/{user}/setRevisor', [AdminController::class, 'setRevisor'])->name('revisoreCheck');
    Route::get('/admin/{user}/setWriter', [AdminController::class, 'setWriter'])->name('scrittoreCheck');
    Route::get('/admin/{user}/unsetAdmin', [AdminController::class, 'unsetAdmin'])->name('adminCheckFalse');
    Route::get('/admin/{user}/unsetRevisor', [AdminController::class, 'unsetRevisor'])->name('revisoreCheckFalse');
    Route::get('/admin/{user}/unsetWriter', [AdminController::class, 'unsetWriter'])->name('scrittoreCheckFalse');
    Route::put('/admin/{tag}/EditTag', [AdminController::class, 'editTags'])->name('aggiornamento.tags');
    Route::delete('/admin/{tag}/DeleteTag', [AdminController::class, 'deleteTags'])->name('elimina.tags');
    Route::put('/admin/{category}/EditCat', [AdminController::class, 'editCats'])->name('aggiornamento.cat');
    // da implementare
    Route::delete('/admin/{category}/DeleteCat', [AdminController::class, 'deleteCats'])->name('elimina.cat');
    Route::post('/admin/create/category', [AdminController::class, 'createCat'])->name('admin.addCat');
});


// rotte revisore

Route::middleware('RevisorMiddleware')->group(function(){
    Route::get('/revisor/dashboard', [RevisorController::class, 'tables'])->name('revisor.tables');
    Route::get('/revisor/{article}', [RevisorController::class, 'show'])->name('article.revisorShow');
    Route::get('/revisor/{article}/setAccepted', [RevisorController::class, 'setAccepted'])->name('article.setAccepted');
    Route::get('/revisor/{article}/setDeclined', [RevisorController::class, 'setDeclined'])->name('article.setDeclined');
});

// Rotte Scrittore
Route::middleware('WriterMiddleware')->group(function(){
    Route::get('/article/create', [WriterController::class, 'create'])->name('article.create');
    Route::post('/article/store', [WriterController::class, 'store'])->name('article.store');
    Route::get('/writer/table', [WriterController::class, 'index'])->name('writer.tables');
    Route::get('/writer/{article}/show', [WriterController::class, 'show'])->name('writer.show');
    Route::delete('/writer/{article}/delete', [WriterController::class, 'delete'])->name('writer.delete');
    Route::get('/writer/{article}/edit', [WriterController::class, 'edit'])->name('writer.edit');
    Route::put('/writer/{article}/update', [WriterController::class, 'update'])->name('writer.update');
    Route::get('/revisor/{article}/setNull', [WriterController::class, 'setNull'])->name('article.setNull');
});