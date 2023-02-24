<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ImportProductsController;
use App\Http\Controllers\admin\OrderConterller;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\StoreController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripePaymentController;

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
Route::get('/getCookie', [\App\Http\Controllers\theme\HomeController::class, 'getCookie']);
Route::get('/', [\App\Http\Controllers\theme\HomeController::class, 'index']);
Route::get('/loadCart', [\App\Http\Controllers\theme\HomeController::class, 'loadCart']);
Route::post('/add-to-cart', [\App\Http\Controllers\theme\HomeController::class, 'addToCart'])->name('addToCart');
Route::post('/update-to-cart', [\App\Http\Controllers\theme\HomeController::class, 'updateToCart'])->name('updateToCart');
Route::post('/delete-to-cart', [\App\Http\Controllers\theme\HomeController::class, 'deleteToCart'])->name('deleteToCart');
Route::get('/check-out', [\App\Http\Controllers\theme\HomeController::class, 'checkOut'])->name('checkOut');
Route::get('/cart', [\App\Http\Controllers\theme\HomeController::class, 'viewCart'])->name('viewCart');
Route::get('/get-cart', [\App\Http\Controllers\theme\HomeController::class, 'getCart']);
Route::get('/user-info/{email}', [\App\Http\Controllers\theme\HomeController::class, 'userInfo']);
Route::get('/check-product-qty', [\App\Http\Controllers\theme\HomeController::class, 'checkProductQty']);
Route::post('/place-order', [\App\Http\Controllers\theme\HomeController::class, 'placeOrder'])->name('placeOrder');
Route::get('/get-current-category/{id?}', [\App\Http\Controllers\theme\HomeController::class, 'loadCategory'])->name('getCurrentCategory');
Route::get('/product/{id}', [\App\Http\Controllers\theme\HomeController::class, 'getProduct'])->name('getProduct');
Route::get('/category/{slug}', [\App\Http\Controllers\theme\HomeController::class, 'getCategoryProducts'])->name('getCategoryProducts');
Route::get('/product/search/{query}', [\App\Http\Controllers\theme\HomeController::class, 'searchProduct'])->name('searchProduct');


Route::post('/calculateShipping', [\App\Http\Controllers\FedExController::class,'allRateService'])->name('calculate.shipping');
Route::get('makeShipment', [\App\Http\Controllers\FedExController::class,'fedexShipment']);

Route::get('/blogs', [\App\Http\Controllers\BlogsController::class,'index'])->name('blogs');


Route::post('/paymentCheckout', [\App\Http\Controllers\theme\HomeController::class,'paymentCheckOut'])->name('payment.checkout');

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/category', [CategoryController::class, 'index']);
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::get('/category-list', [CategoryController::class, 'show']);
    Route::get('/sub-category', [CategoryController::class, 'subCategoryIndex']);
    Route::post('/add-category-node', [CategoryController::class, 'addCategoryNode']);

    Route::get('/products', [ProductController::class, 'index'])->name('homeProductList');
    Route::get('/general-products', [ProductController::class, 'generalProducts']);
    Route::get('/add-product', [ProductController::class, 'create']);
    Route::get('/add-general-product', [ProductController::class, 'generalProduct']);
    Route::post('/product/store', [ProductController::class, 'store']);
    Route::get('/product/category/get-nodes', [ProductController::class, 'getCategoryNodes']);
    Route::get('/product-list', [ProductController::class, 'show']);
    Route::get('/general-product-list', [ProductController::class, 'showGeneralProducts']);



    Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
    Route::get('/edit-general-product/{id}', [ProductController::class, 'editGeneralProduct']);
    Route::get('/product/delete/image/{id}', [ProductController::class, 'deleteProductImage']);
    Route::get('/import-products', [ImportProductsController::class, 'index']);
    Route::post('/import', [ImportProductsController::class, 'importProducts'])->name('import');

    Route::get('/admin/orders',[OrderConterller::class,'index']);
    Route::get('/order-list',[OrderConterller::class,'show']);

    Route::get('/dashboard', function () {
        redirect('/admin');
    })->name('dashboard');


    Route::controller(BlogsController::class)->group(function(){
        Route::get('/add/blog', 'create')->name('add.blog');
        Route::post('/blog/store', 'store')->name('store.blog');
        Route::get('/blog/show', 'show')->name('blog.show');
        Route::get('/blog/list', 'blogList')->name('blog.list');
        Route::get('/edit-blog/{id}', 'edit')->name('blog.edit');
        Route::get('/delete-blog', 'destroy')->name('delete.blog');

    });

    //Property Route
    Route::prefix('store')->group(function () {
        Route::get('/list', [StoreController::class, 'index'])->name('store-list');
        Route::post('/save', [StoreController::class, 'save'])->name('store-save');
    });

});


Route::controller(StripePaymentController::class)->group(function(){
    Route::get('/stripe', 'stripe')->name('stripe');
    Route::post('/stripe', 'stripePostDetails')->name('stripe.post');
});

Route::get('/order/success/{orderId}/{status}',[OrderConterller::class,'orderSuccess'])->name('order.success');
