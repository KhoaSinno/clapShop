<?php

namespace App\Providers;

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
    }
}
