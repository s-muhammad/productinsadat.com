<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $products=Product::latest()->paginate(12);
        return view('index',compact('products'));
    }
    public function search()
    {
        $products=Product::query();
        if ($keywords=request('search')){
            $products->where('title','LIKE',"%{$keywords}%")
                ->orWhere('id','LIKE',"%{$keywords}%");
        }
        $products=$products->latest()->paginate(20);
        return view('products.products',compact('products'));
    }

    public function about()
    {
        $about = About::latest()->get();
        return view('home.about',compact('about'));
    }

}
