<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ChanePassController;
use App\Http\Controllers\changeMailController;
use App\Models\Post;

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
	$posts = Post::with('category')->orderBy('id','desc')->paginate(10);
    return view('pages.posts.index',compact('posts'));
});
Route::resource('logins', LoginController::class)->only(['index','store']);
Route::resource('registers', RegisterController::class)->only(['index','store']);
Route::resource('profiles', ProfileController::class)->only(['index','show']);
Route::resource('comments', CommentController::class)->except(['index','create','show']);

Route::resources([
	'categorys'	=> CategoryController::class,
	'posts'		=> PostController::class,
]);

Route::get('/verifies/{id}', [MailController::class, 'emailVerify'])->name('verifies.emailVerify');
Route::get('/changemailverifies/{id}', [MailController::class, 'changeMailVerify'])->name('changemailverifies.changeMailVerify');
Route::get('/homes', [HomeController::class, 'index'])->name('homes.index');
Route::get('/admins', [HomeController::class, 'admin'])->name('admins.admin');
Route::get('/shows/{id}', [HomeController::class, 'showpost'])->name('shows.showpost');

Route::get('/logouts',[LogoutController::class,'logout'])->name('logouts.logout');

Route::post('/chanepass/{id}',[ChanePassController::class, 'chanePass'])->name('chanepass.chanePass');
Route::post('/changemail/{id}',[changeMailController::class, 'changeMail'])->name('changemail.changeMail');