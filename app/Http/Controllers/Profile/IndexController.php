<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }
    public function address()
    {
        return view('profile.address');
    }
    public function editAddress(Request $request)
    {
        $data = $request->validate([
            'address'=>'required',
            'postal_code'=>'required'
        ]);
        auth()->user()->address()->update($data);
        //alert()->success('نظر شما ارسال شد');
        return back();
    }
}
