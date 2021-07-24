<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function comment(Request $request)
    {
        $data = $request->validate([
            'commentable_id'=>'required',
            'commentable_type'=>'required',
            'comment'=>'required',
            'parent_id'=>'required',
        ]);
        auth()->user()->comments()->create($data);
        alert()->success('نظر شما ارسال شد');
        return back();
    }
}
