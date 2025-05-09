<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Banner;
use App\Models\Basicinfo;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer('frontend.components.topbar', function ($view) {
            $view->with([
                'categories'=> Category::with('subcategories')->get(),
                'basicinfos' => BasicInfo::first(),
            ]);
        });

        View::composer('frontend.components.menu', function ($view) {
            $view->with([
                'categories'=> Category::with('subcategories')->get()
            ]);
        });

        View::composer('frontend.components.navbar', function ($view) {
            $view->with([
                'categories' => Category::all(),
                'banners' => Banner::all()
            ]);
        });

        View::composer('frontend.components.featured', function ($view) {
            $view->with([
                'products'=> Product::all(),
            ]);
        });

        View::composer('frontend.components.categories', function ($view) {
            $view->with([
                'categories' => Category::all(),
            ]);
        });
        View::composer('frontend.components.trendy', function ($view) {
            $view->with([
                'products'=> Product::all(),
            ]);
        });
        View::composer('frontend.components.offer', function ($view) {
            $view->with([
                'banners' => Banner::all(),
            ]);
        });
        View::composer('frontend.components.justarrived', function ($view) {
            $view->with([
                'products'=> Product::all(),
            ]);
        });
        View::composer('frontend.components.brand', function ($view) {
            $view->with([
                'brands'=> Brand::all(),
            ]);
        });
        View::composer('frontend.components.footer', function ($view) {
            $view->with([
                'basicinfos' => BasicInfo::first(),
            ]);
        });

        View::composer('frontend.pages.shop', function ($view) {
            $products = Product::paginate(12);
            $view->with('products', $products);
        });

        View::composer('frontend.components.topbar', function ($view) {
            $cartCount = 0;

            if (Auth::check()) {
                $cartCount = Cart::where('user_id', Auth::id())->count();
            }

            $view->with('cartCount', $cartCount);
        });

        View::composer('frontend.pages.cart', function ($view) {
            $user = Auth::user(); // Check if user is logged in

            $carts = $user ? Cart::where('user_id', $user->id)->get() : collect();

            $subtotal = 0;

            $carts->each(function ($cart) use (&$subtotal) {
                $cart->product = \App\Models\Product::find($cart->product_id);
                $subtotal += $cart->new_price * $cart->quantity;
            });

            $shippingFee = 10;
            $totalPrice = $subtotal + $shippingFee;

            $view->with([
                'carts' => $carts,
                'subtotal' => $subtotal,
                'shippingFee' => $shippingFee,
                'totalprice' => $totalPrice,
            ]);
        });

        View::composer('frontend.pages.checkout', function ($view) {
            $user = Auth::user(); // Check if user is logged in

            $carts = $user ? Cart::where('user_id', $user->id)->get() : collect();

            $subtotal = 0;

            $carts->each(function ($cart) use (&$subtotal) {
                $cart->product = \App\Models\Product::find($cart->product_id);
                $subtotal += $cart->new_price * $cart->quantity;
            });

            $shippingFee = 10;
            $totalPrice = $subtotal + $shippingFee;

            $view->with([
                'carts' => $carts,
                'subtotal' => $subtotal,
                'shippingFee' => $shippingFee,
                'totalprice' => $totalPrice,
            ]);
        });



    }
}
