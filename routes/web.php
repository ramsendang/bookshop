<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CdController;
use App\Http\Controllers\FrontBookController;
use App\Http\Controllers\FrontCdController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbilityController;
use App\Http\Controllers\BackButtonController;
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

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/book',[FrontBookController::class, 'index']);
Route::get('/book/{book}',[FrontBookController::class, 'show']);
Route::get('/cd',[FrontCdController::class, 'index']);
Route::get('/cd/{cd}',[FrontCdController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// for book 
Route::get('/admin/book',[BookController::class, 'index'])->middleware('can:manage_book');
Route::get('/admin/book/edit/{book}',[BookController::class, 'edit'])->middleware('can:manage_book,book');
Route::put('/admin/book/edit/{book}',[BookController::class, 'update'])->middleware('can:manage_book,book');
Route::get('/admin/book/add',[BookController::class, 'create'])->middleware('can:manage_book');
Route::post('/admin/book/add',[BookController::class, 'store'])->middleware('can:manage_book');
Route::delete('/admin/book/delete/{book}',[BookController::class, 'destroy'])->middleware('can:manage_book,book');

// for cd 
Route::get('/admin/cd',[CdController::class, 'index'])->middleware('can:manage_cd');
Route::get('/admin/cd/edit/{cd}',[CdController::class, 'edit'])->middleware('can:manage_cd,cd');
Route::put('/admin/cd/edit/{cd}',[CdController::class, 'update'])->middleware('can:manage_cd,cd');
Route::get('/admin/cd/add',[CdController::class, 'create'])->middleware('can:manage_cd');
Route::post('/admin/cd/add',[CdController::class, 'store'])->middleware('can:manage_cd');
Route::delete('/admin/cd/delete/{cd}',[CdController::class, 'destroy'])->middleware('can:manage_cd,cd');

// for role 
Route::get('/admin/roles',[RoleController::class, 'index'])->middleware('can:is_admin');
Route::get('/admin/role/add',[RoleController::class, 'create'])->middleware('can:is_admin');
Route::post('/admin/role/add',[RoleController::class, 'store'])->middleware('can:is_admin');
Route::get('/admin/role/edit/{role}',[RoleController::class, 'edit'])->middleware('can:is_admin,role');
Route::put('/admin/role/edit/{role}',[RoleController::class, 'update'])->middleware('can:is_admin,role');
Route::delete('/admin/role/delete/{role}',[RoleController::class, 'destroy'])->middleware('can:is_admin,role');

Route::get('/admin/role/assignAbility/{role}',[RoleController::class, 'createAbility']);
Route::post('/admin/role/assignAbility/{role}',[RoleController::class, 'assignAbility']);

// for ability 
Route::get('/admin/abilities',[AbilityController::class, 'index'])->middleware('can:is_admin');
Route::get('/admin/abilities/add',[AbilityController::class, 'create'])->middleware('can:is_admin');
Route::post('/admin/abilities/add',[AbilityController::class, 'store'])->middleware('can:is_admin');
Route::get('/admin/abilities/edit/{ability}',[AbilityController::class, 'edit'])->middleware('can:is_admin,ability');
Route::put('/admin/abilities/edit/{ability}',[AbilityController::class, 'update'])->middleware('can:is_admin,ability');
Route::delete('/admin/abilities/delete/{ability}',[AbilityController::class, 'destroy'])->middleware('can:is_admin,ability');


// for user 
Route::get('/admin/user',[UserController::class, 'index'])->middleware('can:is_admin');
Route::get('/admin/user/assignRole/{user}',[UserController::class, 'createRole'])->middleware('can:is_admin,user');
Route::post('/admin/user/assignRole/{user}',[UserController::class, 'asignRole'])->middleware('can:is_admin,user');


// for back buttons
Route::get('/back/book',[BackButtonController::class, 'bookBack']);
Route::get('/back/cd',[BackButtonController::class, 'cdBack']);
Route::get('/back/role',[BackButtonController::class, 'roleBack']);
Route::get('/back/ability',[BackButtonController::class, 'abilityBack']);
Route::get('/back/assignRole',[BackButtonController::class, 'asignRoleBack']);