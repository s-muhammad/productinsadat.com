<?php
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//
//    return  count(\Cookie::get('cart'));
//});
Route::get('/', [App\Http\Controllers\IndexController::class, 'index']);
Route::get('search', [App\Http\Controllers\IndexController::class, 'search']);

Auth::routes(['verify'=>true]);

Route::post('cart/add/{product}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::get('cart', [App\Http\Controllers\CartController::class, 'cart']);
Route::patch('cart/quantity/change',[App\Http\Controllers\CartController::class, 'quantityChange']);
Route::delete('cart/delete/{cart}',[App\Http\Controllers\CartController::class, 'deleteFromCart'])->name('cart.destroy');

Route::get('products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.list');
Route::get('products/{product}', [App\Http\Controllers\ProductController::class, 'single'])->name('product.detail');
Route::get('products/category/{category}', [App\Http\Controllers\ProductController::class, 'category'])->name('product.category');

Route::middleware('auth')->group(function (){
    Route::post('comments', [App\Http\Controllers\HomeController::class, 'Comment'])->name('send.comment');

    Route::post('payment', [App\Http\Controllers\PaymentController::class, 'payment'])->name('cart.payment');
    Route::get('payment/callback', [App\Http\Controllers\PaymentController::class, 'callback'])->name('payment.callback');
    Route::get('shipping', [App\Http\Controllers\PaymentController::class, 'shipping'])->name('cart.shipping');
    Route::get('shippingComplete', [App\Http\Controllers\PaymentController::class, 'shippingComplete'])->name('shipping.complete');


    Route::get('profile', [App\Http\Controllers\Profile\IndexController::class, 'index']);
    Route::get('profile/address', [App\Http\Controllers\Profile\IndexController::class, 'address'])->name('user.address');
    Route::post('profile/address/{address}', [App\Http\Controllers\Profile\IndexController::class, 'editAddress'])->name('edit.address');

    Route::get('orders', [App\Http\Controllers\OrderController::class, 'index']);
    Route::get('orders/{order}', [App\Http\Controllers\OrderController::class, 'detail'])->name('order.detail');
    Route::get('orders/{order}/payment', [App\Http\Controllers\OrderController::class, 'payment'])->name('order.payment');

});
