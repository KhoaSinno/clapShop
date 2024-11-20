<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\MainController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PosController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\RegisterController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CategoryController as CustomerCategoryController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\ContactController;
use App\Http\Controllers\Customer\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('customer.home');

// Route cho guest (Khách hàng chưa đăng nhập)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    // Register - nhu y
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    // Logout
    // Route::post('/logout', [RisigterController::class, 'logout'])->name('logout');

    //forget - nguyen
    Route::get('/forget', [LoginController::class, 'show'])->name('forget');
    Route::post('/forget', [LoginController::class, 'forget'])->name('forget.forget');

    Route::get('/checkotp', [LoginController::class, 'showOTP'])->name('checkotp');
    Route::post('/checkotp', [LoginController::class, 'checkOTP'])->name('checkotp.checkotp');

    Route::post('/changepass', [LoginController::class, 'changePassword'])->name('checkotp.changepassword');
});
 
// Routes cho Customer
Route::prefix('customer')->group(function () {

    // Customer product
    Route::get('/products', [CustomerProductController::class, 'index'])->name('customer.products');
    Route::get('/products/{slug}', [CustomerProductController::class, 'showProductsBySlug'])->name('customer.products.by_slug');
    Route::get('/product/filter', [CustomerProductController::class, 'filter'])->name('customer.product.filter');

    Route::get('/products/detail/{id}', [CustomerProductController::class, 'show'])->name('customer.product.detail');
    Route::get('product/search', [CustomerProductController::class, 'search'])->name('customer.product.search');

    // Customer contact
    Route::get('/contact', [ContactController::class, 'index'])->name('customer.contact');

    // Customer cart
    Route::get('/cart', [CartController::class, 'index'])->name('customer.cart');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('customer.cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('customer.cart.remove');

    // Customer cart
    Route::post('/cart/update', [CartController::class, 'update'])->name('customer.cart.update');

    Route::middleware(['auth', 'ensureCustomer'])->group(function () {

        // Customer checkout
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('customer.checkout');
        Route::post('/payment', [CheckoutController::class, 'checkout'])->name('customer.checkout.payment');

        // Customer order
        Route::get('/order', [CustomerOrderController::class, 'index'])->name('customer.order');
        Route::get('/order/{id}', [CustomerOrderController::class, 'show'])->name('customer.order.show');

        // Customer profile Nhu Y
        Route::get('/profile', [ProfileController::class, 'index'])->name('customer.profile');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('customer.profile.update');
    });
});

// Routes cho hành động cần đăng nhập
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Routes cho Admin
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Customer Routes
    Route::get('/customer', [CustomerController::class, 'index'])->name('admin.customer');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('admin.customer.create');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('admin.customer.store');
    Route::get('/customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/customer/{id}', [CustomerController::class, 'update']);

    // POS bán hàng: nơi cho quản lý lên đơn cho KH
    Route::get('/pos', [PosController::class, 'index'])->name('admin.pos');
    Route::get('/search-product', [PosController::class, 'searchProduct'])->name('admin.search.product');
    Route::post('/pos/session/{id}', [PosController::class, 'addProductSession'])->name('pos.add.productSession');
    Route::post('/pos/session/remove/{id}', [PosController::class, 'removeProductFromSession'])->name('pos.remove.productSession');
    Route::post('/check-customer', [PosController::class, 'checkCustomer'])->name('pos.checkCustomer');
    Route::post('/create-customer', [PosController::class, 'addNewCustomer'])->name('pos.addNewCustomer');
    Route::post('/order/create', [PosController::class, 'createOrder'])->name('pos.order.store');

    // Category Routes
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');

    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');

    // Product Routes
    Route::get('/product', [ProductController::class, 'index'])->name('admin.product');
    Route::get('/product/listDelete', [ProductController::class, 'listDelete'])->name('admin.product.listDelete');
    Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');

    // nguyen
    Route::post('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');

    Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');
    Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');

    Route::get('/product/detail', [ProductController::class, 'show'])->name('admin.product.detail');

    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.detail.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::post('/product/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');

    Route::get('/products/{product}/images/{image}', [ProductController::class, 'destroyImage'])->name('admin.product.image.destroy');

    // Order Routes
    Route::get('/order', [OrderController::class, 'index'])->name('admin.order');
    Route::get('/order/view/{id}', [OrderController::class, 'view'])->name('admin.order.view');
    Route::get('/order/edit/{id}', [OrderController::class, 'edit'])->name('admin.order.edit');
    Route::put('/order/update/{id}', [OrderController::class, 'update'])->name('admin.order.update');
    Route::put('/order/cancel/{id}', [OrderController::class, 'cancel'])->name('admin.order.cancel');
    Route::get('/order/ordersDelete', [OrderController::class, 'ordersDelete'])->name('admin.order.ordersDelete');
    Route::post('/order/success/{id}', [OrderController::class, 'orderSuccess'])->name('admin.order.success');
});

// Route fallback cho 404 - phải để cuối cùng trong file
Route::fallback(function () {
    return response()->view('errors.404', [], 404); // Hiển thị view 404
});
