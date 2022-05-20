<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BrandController;
use App\Models\Category;

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

/*Login Admin Route*/
Route::get('/admin', [AdminController::class, 'index'])->middleware('adminControl');
Route::get('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/view/{table}', [AdminController::class, 'view'])->name('view')->middleware('adminControl');
Route::get('/admin/create/{table}', [AdminController::class, 'create'])->name('create')->middleware('adminControl');
Route::post('/postLogin', [AdminController::class, 'postLogin'])->name('login_admin');
Route::post('/postRegister', [AdminController::class, 'postRegister'])->name('register_admin');
Route::get('/logout', [AdminController::class, 'signOut'])->name('logout');

/*Create-Admin-Page Route*/
Route::post('/postCreateCategory', [CategoryController::class, 'create'])->name('create_category');
Route::post('/postCreateProduct', [ProductController::class, 'create'])->name('create_product');
Route::post('/postCreatePromotion', [PromotionController::class, 'create'])->name('create_promotion');
Route::post('/postCreateSeller', [SellerController::class, 'create'])->name('create_seller');
Route::post('/postCreateBrand', [BrandController::class, 'create'])->name('create_brand');

/*Update-Admin-Page Route*/
Route::get('/update/{table}/{id}', [AdminController::class, 'update'])->name('update');
Route::post('/postUpdateCategory/{id}', [CategoryController::class, 'update'])->name('update_category');
Route::post('/postUpdatePromotion/{id}', [PromotionController::class, 'update'])->name('update_promotion');
Route::post('/postUpdateProduct/{id}', [ProductController::class, 'update'])->name('update_product');
Route::post('/postUpdateSeller/{id}', [SellerController::class, 'update'])->name('update_seller');
Route::post('/postUpdateAdmin/{id}', [AdminController::class, 'postUpdate'])->name('update_admin');
Route::post('/postUpdateBrand/{id}', [BrandController::class, 'postUpdate'])->name('update_brand');

/*Delete-Admin-Page Route*/
Route::get('/deleteSeller/{id}', [SellerController::class, 'delete'])->name('delete_seller');
Route::get('/deletePromotion/{id}', [PromotionController::class, 'delete'])->name('delete_promotion');
Route::get('/deleteMember/{id}', [MemberController::class, 'delete'])->name('delete_member');

/*Guest Route*/
Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/product', [GuestController::class, 'product'])->name('product');
Route::get('/contact', [GuestController::class, 'contact'])->name('contact');
Route::get('/about-us', [GuestController::class, 'aboutUs'])->name('about_us');
Route::get('/feedback', [GuestController::class, 'feedback'])->name('feedback');
Route::get('/login', [GuestController::class, 'login'])->name('login_member');
Route::get('/register', [GuestController::class, 'register'])->name('register_member');
Route::post('/postLoginMember', [MemberController::class, 'postLogin'])->name('postLogin_member');
Route::post('/postRegisterMember', [MemberController::class, 'postRegister'])->name('postRegister_member');
Route::post('/postUpdateMember/{id}', [MemberController::class, 'postUpdate'])->name('postUpdate_member');
Route::get('/logoutMember', [MemberController::class, 'signOut'])->name('logout_member');
Route::get('/update/{id}', [GuestController::class, 'update'])->name('update_member');
Route::get('/category/{id}', [GuestController::class, 'category'])->name('product');
Route::get('/brandFilter/{id}', [GuestController::class, 'brandFilter'])->name('brand_filter');
Route::get('/productDetail/{id}', [GuestController::class, 'productDetail'])->name('product_detail');

/*Cart Route*/
Route::get('/addCart/{id}', [CartController::class, 'addCart'])->name('addCart');
Route::get('/viewHistoryCart/{id}', [MemberController::class, 'viewHistoryCart'])->name('history_cart');