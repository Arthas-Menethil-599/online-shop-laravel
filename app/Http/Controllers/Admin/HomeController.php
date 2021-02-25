<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Analytic;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $products_count = Product::all()->count();
        $categories_count = Category::all()->count();
        $users = User::all();
        $payments_count = Analytic::all()->count();
        return view('admin.home.index', ['products_count'=>$products_count, 'categories_count' => $categories_count, 'users_count' => $users->count(), 'payments_count' => $payments_count]);
    }
}
