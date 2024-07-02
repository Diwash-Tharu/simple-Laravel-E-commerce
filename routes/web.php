<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontview\UserController;
use App\Http\Controllers\Frontview\WishlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontview\FrontviewController;
use App\Http\Controllers\Frontview\CartController;
use App\Http\Controllers\Frontview\CheckoutController;
use App\Http\Controllers\Trader\categoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Trader\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontviewController::class, 'index']);
Route::get('about-us', [FrontviewController::class, 'aboutus']);
Route::get('category', [FrontviewController::class, 'category']);
// Route::get('view-category/{slug}', [FrontviewController::class, 'viewcategory']);
// Route::get('view-product/{slug}', [FrontviewController::class, 'viewproductdetail']);
// Route::get('category/{catg_slug}/{prod_slug}', [FrontviewController::class, 'productview']);
// Route::get('all-product', [FrontviewController::class, 'allproduct']);

// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::post('add-to-cart', [CartController::class, 'addProduct']);
// Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);
// Route::post('update-cart', [CartController::class, 'updateCart']);

// Route::post('add-to-wishlist', [WishlistController::class, 'add']);
// Route::post('remove-wishlist-item', [WishlistController::class, 'deleteitem']);

// Route::middleware(['auth'])->group(function () {
//     Route::get('cart', [CartController::class, 'viewcart']);
//     Route::get('checkout', [CheckoutController::class, 'index']);
//     Route::post('place-order', [CheckoutController::class, 'placeorder']);

//     Route::get('my-orders', [UserController::class, 'index']);
//     Route::get('view-order/{id}', [UserController::class, 'view']);
//     Route::get('wishlist', [WishlistController::class, 'index']);

// });

// // Route::middleware(['auth', 'isAdmin'])->group(function () {
// //     Route::get('/dashboard', [App\Http\Controllers\Admin\FrontendController::class, 'index'])->name('dashboard');

// //     Route::get('categories', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('categories');

// //     Route::get('products', [App\Http\Controllers\Admin\ProductController::class, 'index']);
// //     Route::get('orders', [App\Http\Controllers\Admin\OrderController::class, 'index']);
// //     Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
// //     Route::put('update-order/{id}', [OrderController::class, 'updateorder']);
// //     Route::get('order-history', [OrderController::class, 'orderhistory']);

// //     Route::get('users', [DashboardController::class, 'users']);
// //     Route::get('view-user/{id}', [DashboardController::class, 'viewuser']);


// // });


// // Route::middleware(['auth', 'isTrader'])->group(function () {
// //     Route::get('/dashboard', [App\Http\Controllers\Trader\FrontendController::class, 'index'])->name('dashboard');

// //     Route::get('categories', [categoryController::class, 'index'])->name('categories');

// //     Route::get('add-category', [categoryController::class, 'add'])->name('add-category');
// //     Route::post('insert-category', [categoryController::class, 'insert'])->name('insert-category');
// //     Route::get('edit-category/{id}', [categoryController::class, 'edit']);
// //     Route::put('update-category/{id}', [categoryController::class, 'update']);
// //     Route::get('delete-category/{id}', [categoryController::class, 'deletee']);

// //     Route::get('products', [ProductController::class, 'index']);
// //     Route::get('add-products', [ProductController::class, 'add']);
// //     Route::post('insert-product', [ProductController::class, 'insert']);
// //     Route::get('edit-product/{id}', [ProductController::class, 'edit']);
// //     Route::put('update-product/{id}', [ProductController::class, 'update']);
// //     Route::get('delete-product/{id}', [ProductController::class, 'deletee']);
// //     Route::get('orders', [App\Http\Controllers\Trader\orderController::class, 'index']);
// //     Route::get('trader/view-order/{id}', [App\Http\Controllers\Trader\orderController::class, 'view']);


// // });


// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         if (auth()->user()->role == '1') {
//             return app(FrontendController::class)->index();
//         } elseif (auth()->user()->role == '2') {
//             return app(App\Http\Controllers\Trader\FrontendController::class)->index();
//         } else {
//             abort(403, 'Unauthorized');
//         }
//     })->name('dashboard');

//     Route::get('categories', function () {
//         if (auth()->user()->role == '1') {
//             return app(App\Http\Controllers\Admin\CategoryController::class)->index();
//         } elseif (auth()->user()->role == '2') {
//             return app(categoryController::class)->index();
//         } else {
//             abort(403, 'Unauthorized');
//         }
//     })->name('categories');

//     Route::middleware(['auth', 'isTrader'])->group(function () {
//         Route::get('add-category', [categoryController::class, 'add'])->name('add-category');
//         Route::post('insert-category', [categoryController::class, 'insert'])->name('insert-category');
//         Route::get('edit-category/{id}', [categoryController::class, 'edit']);
//         Route::put('update-category/{id}', [categoryController::class, 'update']);
//         Route::get('delete-category/{id}', [categoryController::class, 'deletee']);
//     });

//     Route::get('products', function () {
//         if (auth()->user()->role == '1') {
//             return app(App\Http\Controllers\Admin\ProductController::class)->index();
//         } elseif (auth()->user()->role == '2') {
//             return app(ProductController::class)->index();
//         } else {
//             abort(403, 'Unauthorized');
//         }
//     })->name('products');

//     Route::middleware(['auth', 'isTrader'])->group(function () {
//         Route::get('add-products', [ProductController::class, 'add']);
//         Route::post('insert-product', [ProductController::class, 'insert']);
//         Route::get('edit-product/{id}', [ProductController::class, 'edit']);
//         Route::put('update-product/{id}', [ProductController::class, 'update']);
//         Route::get('delete-product/{id}', [ProductController::class, 'deletee']);

//         Route::get('trader/view-order/{id}', [App\Http\Controllers\Trader\orderController::class, 'view']);
//     });


//     Route::get('orders', function () {
//         if (auth()->user()->role == '1') {
//             return app(OrderController::class)->index();
//         } elseif (auth()->user()->role == '2') {
//             return app(App\Http\Controllers\Trader\orderController::class)->index();
//         } else {
//             abort(403, 'Unauthorized');
//         }

//     })->name('orders');

//     Route::middleware(['auth', 'isAdmin'])->group(function () {
//         Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
//         Route::put('update-order/{id}', [OrderController::class, 'updateorder']);
//         Route::get('users', [DashboardController::class, 'users']);
//         Route::get('traders', [DashboardController::class, 'traders']);
//         Route::get('order-history', [OrderController::class, 'orderhistory']);
//         Route::get('view-user/{id}', [DashboardController::class, 'viewuser']);


//         Route::post('activate-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'activate'])->name('activate-product');
//         Route::post('deactivate-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deactivate'])->name('deactivate-product');

//         Route::post('activate-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'activate'])->name('activate-category');
//         Route::post('deactivate-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'deactivate'])->name('deactivate-category');
//     });
// });







