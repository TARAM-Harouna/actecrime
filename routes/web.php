<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ActeCrimeController;
use App\Http\Controllers\TypeActeController;

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


//Route::get('/login', [LoginController::class, 'show']);

Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

// Routes de mot de passe oublié et réinitialisation
Route::get('/password/reset', 'App\Http\Controllers\ForgotPasswordController@showLinkRequestForm')->name('password-request');
Route::post('/password/email', 'App\Http\Controllers\ForgotPasswordController@sendResetLinkEmail')->name('password-email');
Route::get('/password/reset/{token}', 'App\Http\Controllers\ResetPasswordController@showResetForm')->name('reset-password');
Route::post('/password/reset', 'App\Http\Controllers\ResetPasswordController@reset');


Route::get('/pages/{page}', [PageController::class, 'index'])->name('page');
Route::get('/vr', [PageController::class, 'vr'])->name('virtual-reality');
Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/signin', [PageController::class, 'signin'])->name('sign-in-static');
Route::get('/signup', [PageController::class, 'signup'])->name('sign-up-static');


Route::get('/acte_crimes', [ActeCrimeController::class, 'index'])->name('acte_crimes.index');
Route::get('/acte_crimes/create', [ActeCrimeController::class, 'create'])->name('acte_crimes.create');
Route::post('/acte_crimes', [ActeCrimeController::class, 'store'])->name('acte_crimes.store');




Route::get('/type_actes', [TypeActeController::class, 'index'])->name('type_actes.index');
Route::get('/type_actes/create', [TypeActeController::class, 'create'])->name('type_actes.create');
Route::post('/type_actes', [TypeActeController::class, 'store'])->name('type_actes.store');
