<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Login;

use App\Http\Controllers\Toko;

//Controller Admin
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiskonController;
use App\Http\Controllers\Admin\CouriersController;
use App\Http\Controllers\MyAccount;



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


Auth::routes(['verify'=>true]);
Route::middleware(['guest:web'])->group(function(){
    Route::view('/','user.home')->name('welcome');
    Route::get('login',[Login::class,'login'])->name('login');
    Route::get('register',[Login::class,'register'])->name('register');
    route::post('registers_proses',[Login::class,'proses_register'])->name('register_proses');
    Route::post('logins_proses',[Login::class,'proses_login'])->name('login_proses');
});

//kiyomasaaaaa 


Route::middleware(['auth:web'])->group(function(){
    Route::view('home','user.home')->middleware('verified')->name('home');
    Route::get('myAccount',[MyAccount::class,'index'])->name('myaccount');
    Route::post('/logout',[Login::class,'logout'])->name('logout');
    // route::get('toko',[Toko::class,'toko'])->name('home');
});


Route::prefix('admin')->name('admin.')->group(function(){
        Route::middleware(['guest:admin'])->group(function(){
            Route::get('login',[Admin::class,'login'])->name('login');
            route::post('logins_proses',[Admin::class,'proses_login'])->name('login_proses');
        });
        Route::middleware(['auth:admin'])->group(function(){
            Route::view('home','admin.home')->name('home');

            Route::get('products',[ProductController::class,'index'])->name('product.index');
            Route::get('addProduct',[ProductController::class,'addProduct'])->name('add.product');
            Route::post('saveProduct',[ProductController::class,'saveProduct'])->name('save.product');
            Route::get('editProduct/{id}/',[ProductController::class,'editProduct'])->name('edit.product');
            Route::post('saveEditProduct/{id}/',[ProductController::class,'saveEditProduct'])->name('saveEdit.product');
            Route::get('detailProduct/{id}/',[ProductController::class,'detailProduct'])->name('detail.product');
            Route::post('deleteProduct/{id}/',[ProductController::class,'deleteProduct'])->name('delete.product');
            //Route::post('saveDeleteProduct',[ProductController::class,'saveDeleteProduct'])->name('saveDelete.product');


            Route::post('saveImageProduct/{id}',[ProductImageController::class,'addImageProduct'])->name('save.imageProduct');
            Route::post('saveEditImageProduct/{id}/',[ProductImageController::class,'saveEditImageProduct'])->name('saveEdit.imageproduct');
            Route::post('deleteImageProduct/{id}/',[ProductImageController::class,'deleteImageProduct'])->name('delete.imageproduct');

            Route::post('saveCategoryProduct/{id}',[ProductCategoryController::class,'addCategoryProduct'])->name('save.categoryProduct');
            Route::post('saveEditCategoryProduct/{id}/',[ProductCategoryController::class,'saveEditCategoryProduct'])->name('saveEdit.categoryProduct');
            Route::post('deleteCategoryProduct/{id}/',[ProductCategoryController::class,'deleteCategoryProduct'])->name('delete.categoryProduct');


            Route::get('category',[CategoryController::class,'index'])->name('category.index');
            Route::get('addCategory',[CategoryController::class,'addCategory'])->name('add.category');
            Route::post('saveCategory',[CategoryController::class,'saveCategory'])->name('save.category');
            Route::get('editCategory/{id}/',[CategoryController::class,'editCategory'])->name('edit.category');
            Route::post('saveEditCategory/{id}/',[CategoryController::class,'saveEditCategory'])->name('saveEdit.category');
            Route::get('detailCategory/{id}/',[CategoryController::class,'detailCategory'])->name('detail.category');
            Route::post('deleteCategory/{id}/',[CategoryController::class,'deleteCategory'])->name('delete.category');
            //Route::post('saveDeleteCategory',[CategoryController::class,'saveDeleteCategory'])->name('saveDelete.category');


            Route::get('diskon',[DiskonController::class,'index'])->name('diskon.index');
            Route::get('addDiskon',[DiskonController::class,'addDiskon'])->name('add.diskon');
            Route::post('saveDiskon',[DiskonController::class,'saveDiskon'])->name('save.diskon');
            Route::get('editDiskon/{id}',[DiskonController::class,'editDiskon'])->name('edit.diskon');
            Route::post('saveEditDiskon/{id}/',[DiskonController::class,'saveEditDiskon'])->name('saveEdit.diskon');
            Route::get('detailDiskon/{id}/',[DiskonController::class,'detailDiskon'])->name('detail.diskon');
            Route::post('deleteDiskon/{id}/',[DiskonController::class,'deleteDiskon'])->name('delete.diskon');
            //Route::post('saveDeleteDiskon',[DiskonController::class,'saveDeleteDiskon'])->name('saveDelete.diskon');

            Route::get('couriers',[CouriersController::class,'index'])->name('couriers.index');
            Route::get('addCouriers',[CouriersController::class,'addCouriers'])->name('add.couriers');
            Route::post('saveCouriers',[CouriersController::class,'saveCouriers'])->name('save.couriers');
            Route::get('editCouriers/{id}/',[CouriersController::class,'editCouriers'])->name('edit.couriers');
            Route::post('saveEditCouriers/{id}/',[CouriersController::class,'saveEditCouriers'])->name('saveEdit.couriers');
            Route::get('detailCouriers/{id}/',[CouriersController::class,'detailCouriers'])->name('detail.couriers');
            Route::post('deleteCouriers/{id}/',[CouriersController::class,'deleteCouriers'])->name('delete.couriers');
            //Route::post('saveDeleteCouriers',[CouriersController::class,'saveDeleteCouriers'])->name('saveDelete.couriers');


            Route::post('/logout',[Admin::class,'logout'])->name('logout');
            // route::get('toko',[Toko::class,'toko'])->name('home');
        });
});

