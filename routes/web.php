<?php

use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHome;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\MailerController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LiveChatController;
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
Route::get('/admin', [AdminHome::class, 'index']);
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');

Route::get('/about',[AboutController::class,'index'])->name('about');
Route::get('/projects',[ProjectsController::class,'index'])->name('projects');
Route::get('/projects/{slug}',[ProjectsController::class, 'gallery'])->name('gallery');
Route::post('/projects/{title}',[ProjectsController::class, 'projectEmail'])->name('projectEmail');
Route::get('/att-file-download/{id}', [ProjectsController::class, 'fileDownload'])->name('fileDownload2');

Route::get('/services',[ServicesController::class,'categoryIndex'])->name('services');
Route::get('/services/{id}/{slug}',[ServicesController::class,'servicesIndex'])->name('service.details');
Route::get('/clients',[ClientsController::class,'index'])->name('clients');
Route::get('/article',[ArticleController::class,'index'])->name('article');
Route::get('/article/{id}/{slug}',[ArticleController::class,'show'])->name('article.show');

Route::get("email", [MailerController::class, "email"])->name("email");
Route::post("send-email", [MailerController::class, "composeEmail"])->name("send-email");

Route::post('/newsletter',[ContactsController::class, 'newsletter'])->name('newsletter');
// // host reserve
// Route::get('host-reservation/{id}', [DomainController::class, 'hostReservationIndex'])->name('host-reservationindex');
// Route::post('host-reservation', [DomainController::class, 'hostReserveEmail'])->name('host-reservation');
// Route::get('/domain',[DomainController::class,'domainIndex'])->name('domain');
// Route::get('/hosting',[DomainController::class,'hostingIndex'])->name('hosting');
// // domain reserve
// Route::post('domain-reservation', [DomainController::class, 'domainReserveEmail'])->name('domain-reservation');

Route::get('careers', [ContactsController::class, 'careersIndex'])->name('careers');
Route::get('contact', [ContactsController::class, 'contactIndex'])->name('contact');

Route::get('polices', [ContactsController::class, 'polices'])->name('polices');

    
Route::get('/landingPage',function()
    {
        return view('landingPage');
    }
    );
Route::post('careers', [ContactsController::class, 'careersEmail'])->name('careersEmail');
Route::post('contact', [ContactsController::class, 'contactEmail'])->name('contactEmail');
Route::get('/sto',[HomeController::class,'storage']);
Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('/test',[HomeController::class,'test'])->name('test');

// CHAT
Route::get('/support',[LiveChatController::class, 'index'])->name('livechat.index');
Route::get('/chat/{sessionId}',[LiveChatController::class, 'live'])->name('livechat.live');
Route::post('/startSession',[LiveChatController::class, 'startSession'])->name('startSession');
Route::post('/saveChat/{sessionId}',[LiveChatController::class, 'saveChat'])->name('savechat');
Route::get('/service-video/{id}',[LiveChatController::class, 'chooseService'])->name('support.video');

Route::get('/video/{vid}',[HomeController::class, 'homeVideo'])->name('home.videos');
Route::get('/Laws',[HomeController::class, 'homePdf'])->name('home.pdf');