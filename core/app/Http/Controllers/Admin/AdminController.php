<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pageTitle = 'Dashboard';
        $widget = [
            'total_users'      => User::count(),
            'total_products'   => Product::count(),
            'active_users'     => User::where('status', 1)->count(),
            'total_categories' => Category::count(),
        ];
        $recent_products = Product::with('category')->latest()->take(5)->get();
        $recent_users    = User::latest()->take(5)->get();

        return view('admin.dashboard', compact('pageTitle', 'widget', 'recent_products', 'recent_users'));
    }
}
