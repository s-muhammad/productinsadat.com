<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::query();
        if ($keywords=request('search')){
            $products->where('title','LIKE',"%{$keywords}%")
                ->orWhere('id','LIKE',"%{$keywords}%");
        }
        $products=$products->latest()->paginate(20);
        return view('admin.products.all',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'inventory' => ['required'],
            'categories' => ['required'],
            'attributes' => 'array',
            'image'=>'required',
            'colors'=>'required',
            'sizes'=>'required'
        ]);

        $product = auth()->user()->products()->create($data);
        $product->categories()->sync($data['categories']);
        $product->colors()->sync($data['colors']);
        $product->sizes()->sync($data['sizes']);

        if (isset($data['attributes']))
            $this->attachAttributesToProduct($product, $data);

        alert()->success('با موفقیت انجام شد');
        return redirect(route('admin.products.index'));
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
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
//        return $product->attributes[0]->pivot->product;
        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data= $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'inventory' => ['required'],
            'categories' => ['required'],
            'attributes' => ['required'],
            'image' => ['required'],
            'colors' => ['required'],
            'sizes' => ['required'],

        ]);

        $product->update($data);
        $product->categories()->sync($data['categories']);
        $product->colors()->sync($data['colors']);
        $product->sizes()->sync($data['sizes']);
        $product->attributes()->detach();
        if (isset($data['attributes']))
            $this->attachAttributesToProduct($product, $data);
        alert()->success('با موفقیت انجام شد');
        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        alert()->success('با موفقیت انجام شد');
        return back();
    }
    protected function attachAttributesToProduct(Product $product, array $data): void
    {
        $attributes = collect($data['attributes']);
        $attributes->each(function ($item) use ($product) {
            if (is_null($item['name']) || is_null($item['value'])) return;

            $attr = Attribute::firstOrCreate(
                ['name' => $item['name']]
            );

            $attr_value = $attr->values()->firstOrCreate(
                ['value' => $item['value']]
            );

            $product->attributes()->attach($attr->id, ['value_id' => $attr_value->id]);
        });
    }
}
