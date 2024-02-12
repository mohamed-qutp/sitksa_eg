<?php

use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\ContactsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\YoutubeController;
use App\Http\Controllers\Admin\MetaTagController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\TextAreaController;

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

Auth::routes();
Route::get('/admin', [HomeController::class, 'index']);

Route::get('/index',[HomeController::class, 'index'])->name('admin.home'); 
Route::resource('/about-us','\App\Http\Controllers\Admin\AboutController');

Route::get('/slider',[SliderController::class, 'index'])->name('slider.index');
Route::delete('/slider/{slider}',[SliderController::class, 'destroy'])->name('slider.destroy');
Route::post('/slider',[SliderController::class, 'create'])->name('slider.create');

Route::resource('/category','\App\Http\Controllers\Admin\CategoryController');
Route::resource('/services','\App\Http\Controllers\Admin\ServicesController');
Route::get('/services/cat/{catID}',[ServicesController::class, 'index'])->name('services.index');

Route::resource('/clients','\App\Http\Controllers\Admin\ClientsController');
Route::post('/changeOrder/{id}',[ClientsController::class,'changeOrder'])->name('changeOrder');

Route::resource('/projects','\App\Http\Controllers\Admin\ProjectsController');
Route::get('/project-details/edit/{id}',[ProjectsController::class,'editDetails'])->name('projectdetails.edit');
Route::put('/project-details/{id}',[ProjectsController::class,'updateDetails'])->name('updateDetails');
Route::get('/project-details/add/{id}',[ProjectsController::class,'addDetails'])->name('addDetails');
Route::post('/project-details/add/{id}',[ProjectsController::class,'add_Details'])->name('add.Details');
Route::delete('/project-details/{id}/{projectID}',[ProjectsController::class,'deleteDetails'])->name('deleteDetails');



Route::get('/contacts',[ContactsController::class,'contactsIndex'])->name('contactsIndex');
Route::get('/contacts/{id}',[ContactsController::class,'contactDetails'])->name('contactDetails');

Route::get('/newsletter',[ContactsController::class,'newsletterList'])->name('newsletter.index');

Route::resource('/youtube','\App\Http\Controllers\Admin\YoutubeController');

//articles
Route::resource('/article','\App\Http\Controllers\Admin\ArticlesController');
Route::get('/article/create/{article}',[ArticlesController::class, 'createDetails'])->name('article.createDetails');
Route::post('/article/create/{article}',[ArticlesController::class, 'storeDetails'])->name('article.storeDetails');
Route::get('/article/edit/{articleDetails}',[ArticlesController::class, 'editDetails'])->name('article.editDetails');
Route::put('/article/edit/{articleDetails}',[ArticlesController::class, 'updateDetails'])->name('article.updateDetails');
Route::delete('article/delete/{articleDetails}',[ArticlesController::class, 'destroyDetails'])->name('articles.destroyDetails');

Route::get('/meta',[MetaTagController::class,'index'])->name('meta.index');
Route::post('/meta',[MetaTagController::class,'store'])->name('meta.store');
Route::get('/meta/{id}/edit',[MetaTagController::class,'edit'])->name('meta.edit');
Route::put('/meta/{id}/edit',[MetaTagController::class,'update'])->name('meta.update');
Route::delete('/meta/{id}',[MetaTagController::class,'destroy'])->name('meta.destroy');


Route::get('/text',[TextAreaController::class,'index'])->name('text.index');
Route::post('/text',[TextAreaController::class,'store'])->name('text.store');
Route::get('/att-file-download/{id}', [ProjectsController::class, 'fileDownload'])->name('fileDownload');

// Route::resource('/hosting','\App\Http\Controllers\Admin\DomainController');

// support
Route::resource('/support','\App\Http\Controllers\Admin\SupportController');
Route::resource('/support-users','\App\Http\Controllers\Admin\SupportUsersController');

Route::get('/support/create/videos/{support}',[SupportController::class, 'createVideos'])->name('support.createVideos');
Route::post('/support/create/videos/{support}',[SupportController::class, 'storeVideos'])->name('support.storeVideos');
Route::delete('/support/destory/videos/{support}',[SupportController::class, 'destroyVideo'])->name('support.destroyVideo');

