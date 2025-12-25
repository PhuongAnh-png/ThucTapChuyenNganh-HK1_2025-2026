<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $categories = Category::where('status', 1)->get();
        view()->share(['categories' => $categories]);
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin', compact('categories'));
    }

    public function home()
    {
        $categories = Category::all();
        $products = Products::where('status', 1)->get();
        return view('home', compact('categories', 'products'));
    }

    public function category_product($id)
    {
        $products = Products::where('category_id', $id)->where('status', 1)->get();

        return view('home.category_product', compact('products'));
    }

    public function single_product($id)
    {
        $product = Products::where('id', $id)->firstOrFail();

        return view('home.single_product', compact('product'));
    }
    public function product()
    {
        return view('product');
    }
}
