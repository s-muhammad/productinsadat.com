<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('products.products',compact('products'));
    }

    public function single(Product $product)
    {
        $product->update([
            'view_count'=>+1
        ]);
        $images = $product->gallery()->latest()->get();
        return view('products.single-product',compact('product','images'));
    }
    public function category(Category $category)
    {
        $products=$category->products()->latest()->paginate(12);
        return view('products.products',compact('products'));
    }
}
