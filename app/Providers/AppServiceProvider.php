<?php

namespace App\Providers;

use App\Http\Controllers\Customer\CartController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category; // Import model Category
class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('customer.main_layout', function ($view) {
            $categories = Category::all();
            $view->with('categories', $categories);
        });

        // View::composer('customer.main_layout', function ($view) {
        //     $cartController = new CartController();
        //     $itemCount = $cartController->getCartItemCount();
        //     $view->with('cartItemCount', $itemCount); // Chia sẻ biến với view
        // });
    }
}
