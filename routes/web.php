<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\ArticlesController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use App\Models\Articles;
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
    $articles= Articles::all();
    //echo '<pre>'; print_r($articles); die;
    return view('welcome')->with('articles',$articles);
});
Route::get('single-article/{id}', [ArticlesController::class,'singleArticle'])->name('singleArticle');
Route::get('admin/login',[AuthController::class,'login'])->name('loogin');
Route::post('admin/login',[AuthController::class,'postLogin'])->name('postLogin');
Route::get('admin/register',[AuthController::class,'register']);
Route::post('admin/register',[AuthController::class,'postRegister'])->name('postRegister');
Route::get('admin/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');
Route::get('admin/add-article',[ArticlesController::class,'addArticle'])->name('addArticle');
Route::post('admin/add-article',[ArticlesController::class,'postArticle'])->name('postArticle');
Route::get('admin/articles',[ArticlesController::class,'allArticles'])->name('allArticles');

Route::get('admin/edit-article/{id}',[ArticlesController::class,'editArticle'])->name('editArticle');
Route::post('admin/update-article',[ArticlesController::class,'updateArticle'])->name('updateArticle');
Route::get('admin/delete-article/{id}',[ArticlesController::class,'deleteArticle'])->name('deleteArticle');
Route::get('admin/logout', [ArticlesController::class,'logout'])->name('logout');
