<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Login;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\MyAccount;


//Controller Admin
use App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiskonController;
use App\Http\Controllers\Admin\CouriersController;
use App\Http\Controllers\Admin\TransaksiAdminController;
use App\Http\Controllers\Admin\ManagementAdminController;
use App\Http\Controllers\Admin\AdminRespondController;
use App\Http\Controllers\Admin\AdminMarkAsReadController;




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

    //SHOP  
    Route::get('belanja', [ShopController::class, 'index'])->name('belanja.general');
    Route::get('belanja/category={slug}', [ShopController::class, 'shop_category'])->name('belanja.category');
    Route::get('belanja/product={slug}', [ShopController::class, 'shop_detail_product'])->name('belanja.product.detail');

});

//kiyomasaaaaa 


Route::middleware(['auth:web'])->group(function(){
    Route::get('home', [HomeController::class, 'index'])->middleware('verified')->name('home');

    //MY ACCOUNT
    Route::get('myprofile',[MyAccount::class,'index'])->middleware('verified')->name('myprofile');
    Route::post('myprofile/update',[MyAccount::class,'update_profil'])->middleware('verified')->name('myprofile.update');
    Route::post('myAccount',[MyAccount::class,'update_profil_photo'])->middleware('verified')->name('myprofile.update.photo');

    Route::get('myTransaction',[TransaksiController::class,'index'])->middleware('verified')->name('mytransaction');


    //CART
    Route::get('cart', [CartController::class, 'index'])->middleware('verified')->name('cart.index');
    Route::post('/cart/add',[CartController::class,'create'])->middleware('verified')->name('cart.add');
    Route::post('/cart-update',[CartController::class,'update'])->middleware('verified')->name('cart.update');  
    Route::post('/cart-delete/{id}',[CartController::class,'destroy'])->middleware('verified')->name('cart.delete');  
    Route::post('/cart/clear',[CartController::class,'clear_cart'])->middleware('verified')->name('cart.clear'); 

    //SHOP  
    Route::get('shop', [ShopController::class, 'index'])->middleware('verified')->name('shop.general');
    Route::get('shop/category={slug}', [ShopController::class, 'shop_category'])->middleware('verified')->name('shop.category');
    Route::get('shop/product={slug}', [ShopController::class, 'shop_detail_product'])->middleware('verified')->name('shop.product.detail');



    //CHECKOUT
    Route::get('checkout', [TransaksiController::class, 'checkout'])->middleware('verified')->name('checkout');
    Route::post('checkout/confirm', [TransaksiController::class, 'checkout_confirm'])->middleware('verified')->name('checkout_confirm');
    Route::get('checkout/detail-{id}', [TransaksiController::class, 'checkout_detail'])->middleware('verified')->name('checkout.detail');


    Route::post('checkout/upload-payment-{id}', [TransaksiController::class, 'upload_bukti_pembayaran'])->middleware('verified')->name('checkout.upload.bukti_payment');
    Route::post('checkout/cancelled-{id}', [TransaksiController::class, 'checkout_cancelled'])->middleware('verified')->name('checkout.cancelled');
    Route::post('review/post-{id}', [TransaksiController::class, 'review_post'])->middleware('verified')->name('review_post');



    

    Route::post('/logout',[Login::class,'logout'])->name('logout');
    
});


Route::prefix('admin')->name('admin.')->group(function(){
        Route::middleware(['guest:admin'])->group(function(){
            Route::get('login',[Admin::class,'login'])->name('login');
            route::post('logins_proses',[Admin::class,'proses_login'])->name('login_proses');
        });
        Route::middleware(['auth:admin'])->group(function(){
            // Route::view('home','admin.home')->name('home');
            Route::get('home',[HomeAdminController::class,'index'])->name('home');
            Route::get('mark-notification',[AdminMarkAsReadController::class,''])->name('markNotification');


            // CRUD MANAGEMENT ADMIN MASTER
            Route::get('managementAdmin',[ManagementAdminController::class,'index'])->name('managementAdmin.index');
            Route::get('addAkunAdmin',[ManagementAdminController::class,'addAdmin'])->name('managementAdmin.add');
            Route::post('saveAkunAdmin',[ManagementAdminController::class,'saveAdmin'])->name('save.managementAdmin');
            Route::get('editAkunAdmin/{id}/',[ManagementAdminController::class,'editAdmin'])->name('edit.managementAdmin');
            Route::post('saveEditAkunAdmin/{id}/',[ManagementAdminController::class,'saveEditAdmin'])->name('saveEdit.managementAdmin');
            Route::get('detailAkunAdmin/{id}/',[ManagementAdminController::class,'detailAdmin'])->name('detail.managementAdmin');
            Route::post('deleteAkunAdmin/{id}/',[ManagementAdminController::class,'deleteAdmin'])->name('delete.managementAdmin');

            //CRUD TRANSAKSI
            Route::get('transaksi',[TransaksiAdminController::class,'index'])->name('transaksi.index');
            Route::get('transaksi/detail-{id}',[TransaksiAdminController::class,'detail'])->name('transaksi.detail');
            Route::post('transaksi/verifikasi-{id}',[TransaksiAdminController::class,'trx_verifikasi'])->name('transaksi.verifikasi');
            Route::post('transaksi/delivery-{id}',[TransaksiAdminController::class,'trx_delivery'])->name('transaksi.delivery');
            Route::post('transaksi/success-{id}',[TransaksiAdminController::class,'trx_success'])->name('transaksi.success');


            //CRUD Respond
            Route::get('respond',[AdminRespondController::class,'index'])->name('respond.index');
            Route::get('respond/detail-{id}',[AdminRespondController::class,'detail'])->name('respond.detail');
            Route::post('respond/save-{id}',[AdminRespondController::class,'save_respond'])->name('admin.save.respond');






            // CRUD PRODUCT MASTER
            Route::get('products',[ProductController::class,'index'])->name('product.index');
            Route::get('addProduct',[ProductController::class,'addProduct'])->name('add.product');
            Route::post('saveProduct',[ProductController::class,'saveProduct'])->name('save.product');
            Route::get('editProduct/{id}/',[ProductController::class,'editProduct'])->name('edit.product');
            Route::post('saveEditProduct/{id}/',[ProductController::class,'saveEditProduct'])->name('saveEdit.product');
            Route::get('detailProduct/{id}/',[ProductController::class,'detailProduct'])->name('detail.product');
            Route::post('deleteProduct/{id}/',[ProductController::class,'deleteProduct'])->name('delete.product');



            //CRUD IMAGE PRODUCT
            Route::post('saveImageProduct/{id}',[ProductImageController::class,'addImageProduct'])->name('save.imageProduct');
            Route::post('saveEditImageProduct/{id}/',[ProductImageController::class,'saveEditImageProduct'])->name('saveEdit.imageproduct');
            Route::post('deleteImageProduct/{id}/',[ProductImageController::class,'deleteImageProduct'])->name('delete.imageproduct');

            //CRUD DETAIL KATEGORI PRODUCT
            Route::post('saveCategoryProduct/{id}',[ProductCategoryController::class,'addCategoryProduct'])->name('save.categoryProduct');
            Route::post('saveEditCategoryProduct/{id}/',[ProductCategoryController::class,'saveEditCategoryProduct'])->name('saveEdit.categoryProduct');
            Route::post('deleteCategoryProduct/{id}/',[ProductCategoryController::class,'deleteCategoryProduct'])->name('delete.categoryProduct');


            //CRUD KATEGORI MASTER
            Route::get('category',[CategoryController::class,'index'])->name('category.index');
            Route::get('addCategory',[CategoryController::class,'addCategory'])->name('add.category');
            Route::post('saveCategory',[CategoryController::class,'saveCategory'])->name('save.category');
            Route::get('editCategory/{id}/',[CategoryController::class,'editCategory'])->name('edit.category');
            Route::post('saveEditCategory/{id}/',[CategoryController::class,'saveEditCategory'])->name('saveEdit.category');
            Route::get('detailCategory/{id}/',[CategoryController::class,'detailCategory'])->name('detail.category');
            Route::post('deleteCategory/{id}/',[CategoryController::class,'deleteCategory'])->name('delete.category');


            //DISKON
            Route::get('diskon',[DiskonController::class,'index'])->name('diskon.index');
            Route::get('addDiskon',[DiskonController::class,'addDiskon'])->name('add.diskon');
            Route::post('saveDiskon',[DiskonController::class,'saveDiskon'])->name('save.diskon');
            Route::get('editDiskon/{id}',[DiskonController::class,'editDiskon'])->name('edit.diskon');
            Route::post('saveEditDiskon/{id}/',[DiskonController::class,'saveEditDiskon'])->name('saveEdit.diskon');
            Route::get('detailDiskon/{id}/',[DiskonController::class,'detailDiskon'])->name('detail.diskon');
            Route::post('deleteDiskon/{id}/',[DiskonController::class,'deleteDiskon'])->name('delete.diskon');


            //CRUD MASTER KURIR
            Route::get('couriers',[CouriersController::class,'index'])->name('couriers.index');
            Route::get('addCouriers',[CouriersController::class,'addCouriers'])->name('add.couriers');
            Route::post('saveCouriers',[CouriersController::class,'saveCouriers'])->name('save.couriers');
            Route::get('editCouriers/{id}/',[CouriersController::class,'editCouriers'])->name('edit.couriers');
            Route::post('saveEditCouriers/{id}/',[CouriersController::class,'saveEditCouriers'])->name('saveEdit.couriers');
            Route::get('detailCouriers/{id}/',[CouriersController::class,'detailCouriers'])->name('detail.couriers');
            Route::post('deleteCouriers/{id}/',[CouriersController::class,'deleteCouriers'])->name('delete.couriers');


            Route::post('/logout',[Admin::class,'logout'])->name('logout');
        });
});

