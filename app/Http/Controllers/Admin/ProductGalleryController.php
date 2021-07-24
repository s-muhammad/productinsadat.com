<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $images = $product->gallery()->latest()->get();
        return view('admin.products.gallery.all',compact('product','images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.products.gallery.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Product $product)
    {
        $data = $request->validate([
           'images.*.image'=>'required',
           'images.*.alt'=>'required|min:3',
        ]);
        collect($data['images'])->each(function ($image) use ($product){
            $product->gallery()->create($image);
        });
        return redirect(route('admin.product.gallery.index',['product'=>$product->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product , ProductGallery $gallery)
    {
        return view('admin.products.gallery.edit',compact('product','gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product , ProductGallery $gallery)
    {
        $data = $request->validate([
            'image'=>'required',
            'alt'=>'required|min:3',
        ]);
        $gallery->update($data);
        //alert()->success();
        return redirect(route('admin.product.gallery.index',['product'=>$product->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product ,ProductGallery $gallery)
    {
        $gallery->delete();
        //alert()->success();
        return redirect(route('admin.product.gallery.index',['product'=>$product->id]));

    }
}
