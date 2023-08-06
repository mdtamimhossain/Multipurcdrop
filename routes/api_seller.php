<?php

namespace App\Http\Controllers\Api\V2\Seller;

use Route;

Route::group(['prefix' => 'v2/seller', 'middleware' => ['app_language']], function () {

    Route::middleware(['auth:sanctum'])->group(function () {

        //Order Section
        Route::controller(OrderController::class)->group(function () {
            Route::get('orders', 'getOrderList');
            Route::get('orders/details/{id}', 'getOrderDetails');
            Route::post('orders/items/{id}', 'getOrderItems');
            Route::post('orders/update-delivery-status', 'update_delivery_status');
            Route::post('orders/update-payment-status', 'update_payment_status');

            // Route::apiResource('shops', 'App\Http\Controllers\Api\V2\ShopController')->only('index');
        });

        //Shop Section
        Route::controller(ShopController::class)->group(function () {
            Route::get('payment-history', 'payment_histories');
            Route::get('commission-list', 'collection_histories');
            Route::get('profile', 'profile');
            Route::get('dashboard/category-wise-products', 'category_wise_products');
            Route::get('dashboard/sales-stat', 'sales_stat');
            Route::get('dashboard/top-12-product', 'top_12_products');
            Route::get('dashboard/dashboard-counters', 'app_dashboard_counters');
            Route::get('shop/info', 'info');
            Route::get('package/info', 'pacakge');
            Route::post('shop-update', 'update');
            Route::get('shop-verify-form', 'getVerifyForm');
            Route::post('shop-verify-info-store', 'store_verify_info');
        });

        //Refund Section
        Route::controller(RefundController::class)->group(function () {
            Route::get('refunds', 'index');
            Route::post('refunds/approve', 'request_approval_vendor');
            Route::post('refunds/reject', 'reject_refund_request');
        });
        //Withdraw Request Section
        Route::controller(WithdrawRequestController::class)->group(function () {
            Route::get('withdraw-request', 'index');
            Route::post('withdraw-request/store', 'store');
        });

        //Product Section
        Route::controller(ProductController::class)->group(function () {
            Route::get('products/all', 'index');
            Route::get('products/categories', 'getCategory');
            Route::get('products/brands', 'getBrands');
            Route::get('products/taxes', 'getTaxes');
            Route::get('products/attributes', 'getAttributes');
            Route::get('products/colors', 'getColors');
            Route::post('products/add', 'store');
            Route::get('products/edit/{id}', 'edit');
            Route::post('products/update/{product}', 'update');
            Route::post('product/change-featured', 'change_featured_status');
            Route::post('product/change-status', 'change_status');
            Route::get('product/duplicate/{id}', 'duplicate');
            Route::get('product/delete/{id}', 'destroy');
            Route::get('products/remaining-uploads', 'remainingUploads');

            Route::get('products/reviews', 'product_reviews');

            Route::get('products/search', 'search');
        });
        //Whole Sale Product Section
        Route::controller(WholesaleProductController::class)->group(function () {
            Route::get('wholesale-products', 'wholesale_products');
            Route::post('wholesale-product/create', 'product_store');
            Route::get('wholesale-product/edit/{id}', 'product_edit');
            Route::post('wholesale-product/update/{id}', 'product_update');
            Route::get('wholesale-product/destroy/{id}', 'product_destroy');
        });

        //Coupon Section
        Route::controller(CouponController::class)->group(function () {
            Route::get('coupon/all', 'index');
            Route::post('coupon/create', 'store');
            Route::get('coupon/edit/{id}', 'edit');
            Route::get('coupon/delete/{id}', 'destroy');
            Route::post('coupon/update/{coupon}', 'update');
            Route::get('coupon/for-product', 'coupon_for_product');
        });

        //Conversations 
        Route::controller(ConversationController::class)->group(function () {
            Route::get('conversations', 'index');
            Route::get('conversations/show/{id}', 'showMessages');
            Route::post('conversations/message/store', 'send_message_to_customer');
        });

        //Seller Package 
        Route::controller(SellerPackageController::class)->group(function () {
            Route::get('seller-packages-list', 'seller_packages_list');
            Route::post('seller-package/offline-payment', 'purchase_package_offline');
            Route::post('seller-package/free-package', 'purchase_free_package');
        });

        //Seller File Upload 
        Route::controller(SellerFileUploadController::class)->group(function () {
            Route::post('file/upload', 'upload');
            Route::get('file/all', 'index');
            Route::get('file/delete/{id}', 'destroy');
        });

        // ...
    });

    Route::post('shops/create', [ShopController::class,'store']);


});
