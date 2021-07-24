<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::query();
        if ($search = \request('search')){
            $orders->where('id',$search)->orWhere('tracking_serial',$search);
        }
        $orders = $orders->where('status' , request('type'))->latest()->paginate(20);
        return view('admin.orders.all',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
//        return $order->products;
//        $product = $order->products()->paginate(20);
        return view('admin.orders.detail',compact('order'));
    }

    public function payments(Order $order)
    {
//        return $order->payments;
//        $payments = $order->payments()->latest();
        return view('admin.orders.payment',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $data = $this->validate($request,[
           'status' => ['required',Rule::in('paid','unpaid','posted','canceled','received','preparation')],
            'tracking_serial' => 'required',
        ]);
        $order->update($data);
        return redirect(route('admin.orders.index')."?type=$order->status");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        alert()->success();
        return back();
    }
}
