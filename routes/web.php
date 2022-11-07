<?php

use Illuminate\Support\Facades\Route;

use App\Models\Category;
use App\Models\Products;
use App\Models\Images;
use App\Models\Cart;
use App\Models\User;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;


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


Route::get('/', [UserController::class, 'index'])->name('/');

Route::get('/products', function(){
    return view('pages.products');
});

//Search
Route::get('search', [ProductsController::class, 'searchItem'])->name('search');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    //Admin Action
    // PDF
    Route::get('/allusers/pdf', [UserController::class, 'createPDF'])->name('filter');
    Route::get('/logs/pdf', [UserController::class, 'createActivityPDF'])->name('filter_activity');
    // Export Excel
    Route::get('/export-users',[UserController::class,'exportUsers'])->name('export-users');
    Route::get('/export-activities',[UserController::class,'exportActivities'])->name('export-activities');
    //Dashboard
    Route::get('dashboard', [UserController::class, 'redirect'])->name('dashboard');
    Route::post('cart/{userid}/{id}', [CartController::class, 'addToCart'])->name('cart');
    Route::post('delcart/{id}', [CartController::class, 'destroy'])->name('delcart');
    //Users
    Route::get('users', [UserController::class, 'viewUsers'])->name('users');
    Route::post('activate/{id}', [UserController::class, 'activateUser'])->name('activate');
    Route::post('deactivate/{id}', [UserController::class, 'deactivateUser'])->name('deactivate');
    //Products
    Route::get('viewProducts', [ProductsController::class, 'viewProducts'])->name('viewProducts');
    Route::post('activate_product/{id}', [ProductsController::class, 'activateProduct'])->name('activate_product');
    Route::post('deactivate_product/{id}', [ProductsController::class, 'deactivateProduct'])->name('deactivate_product');
    Route::get('addProducts', [ProductsController::class, 'addProduct'])->name('addProducts');
    Route::post('add_product', [ProductsController::class, 'addProductProcessor'])->name('add_product');
    //Categories
    Route::get('viewCategories', [CategoryController::class, 'viewCategories'])->name('viewCategories');
    Route::post('add_category', [CategoryController::class, 'addCategoryProcessor'])->name('add_category');
    Route::get('addCategory', [CategoryController::class, 'addCategory'])->name('addCategory');
    //Product details
    Route::get('productdetails/{id}', [ProductsController::class, 'productdetails'])->name('productdetails');
    
    //Checkout
    Route::get('checkout/{id}', [ProductsController::class, 'CheckOutView'])->name('checkout');
    Route::get('activitylogs', [UserController::class, 'activityLogs'])->name('activitylogs');
    Route::get('payment_confirmation/{id}', [CartController::class, 'PaymentConfirm'])->name('payment_confirmation');
    //Edits
    Route::post('edituser/{id}', [UserController::class, 'editUser'])->name('edituser');
    Route::get('deleteuser/{id}', [UserController::class, 'deleteUser'])->name('deleteuser');
});
