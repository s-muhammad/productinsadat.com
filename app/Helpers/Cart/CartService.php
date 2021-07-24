<?php


namespace App\Helpers\Cart;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Modules\Discount\Entities\Discount;

class CartService
{
    protected $cart;
    protected $name= 'cart';
    public function __construct()
    {
//        $cart = session()->get('cart') ?? collect([]);
        $cart = collect(json_decode(request()->cookie($this->name),true));

        $this->cart = $cart->count() ? $cart : collect([
           'items'=>[],
            'discount'=>null
        ]);

    }

    public function put(array $value,$obj = null)
    {
        if (! is_null($obj) && $obj instanceof Model){
            $value = array_merge($value , [
                'id'=> Str::random(10),
                'subject_id'=>$obj->id,
                'subject_type'=>get_class($obj),
                'discount_percent'=>0
            ]);
//            dd($value);
        }elseif (! isset($value['id'])){
            $value=array_merge($value,[
                'id'=>Str::random(10)
            ]);
        }
        $this->cart['items']=collect($this->cart['items'])->put($value['id'],$value);
//        session()->put('cart',$this->cart);
        $this->storeCookie();
//        dd($this);
        return $this;
    }

    public function update($key , $options)
    {
        $item = collect($this->get($key , false));

        if (is_numeric($options)){
            $item = $item->merge([
                'quantity' => $item['quantity'] + $options
            ]);
        }

        if (is_array($options)){
            $item = $item->merge($options);
        }

        $this->put($item->toArray());

        return $this;
    }

    public function count($key)
    {
        if (! $this->has($key)) return 0 ;

        return $this->get($key)['quantity'];
    }

    public function has($key)
    {
        if ($key instanceof Model){
            return ! is_null(
                collect($this->cart['items'])->where('subject_id',$key->id)->where('subject_type',get_class($key))->first()
            );
        }
        return ! is_null(
            collect($this->cart['items'])->firstWhere('id',$key)
        );
    }

    public function get($key , $withRelationship = true)
    {
        $item =$key instanceof Model
            ? collect($this->cart['items'])->where('subject_id',$key->id)->where('subject_type',get_class($key))->first()
            : collect($this->cart['items'])->firstWhere('id',$key);
        return $withRelationship ? $this->withRelationshipIfExist($item) : $item ;
    }

    public function all()
    {
        $cart = $this->cart;

        $cart = collect($this->cart['items'])->map(function ($item) use ($cart){
            $item = $this->withRelationshipIfExist($item);
            $item = $this->checkDiscountValidate($item , $cart['discount']);
            return $item;
        });
//        dd($cart);
        return $cart;
    }

    public function delete($key)
    {
        if ($this->has($key)){
            $this->cart['items'] = collect($this->cart['items'])->filter(function ($item) use ($key){
                if ($key instanceof Model){
                    return ($item['subject_id'] != $key->id) && ($item['subject_type'] != get_class($key));
                }
                return $key != $item['id'];
            });
//            session()->put('cart' , $this->cart);
            $this->storeCookie();
            return true;
        }
        return false;
    }

    public function flush()
    {
        $this->cart = collect([
            'items'=>[],
            'discount'=>null
        ]);

        $this->storeCookie();

        return $this;
    }

    public function instance($name)
    {
        $cart = collect(json_decode(request()->cookie($name),true));
        $this->cart = $cart->count() ? $cart :collect([
            'items'=>[],
            'discount'=>null
        ]);
        $this->name = $name;
        return $this;
    }

    public function addDiscount($discount)
    {
        $this->cart['discount'] = $discount;
        $this->storeCookie();
    }

    protected function withRelationshipIfExist($item)
    {
        if(isset( $item['subject_id'] ) && isset($item['subject_type']) ) {
            $class = $item['subject_type'];
            $subject = (new $class())->find( $item['subject_id'] );

            $item[strtolower(class_basename($class))] = $subject;

            unset($item['subject_id']);
            unset($item['subject_type']);

            return $item;
        }


        return $item;
    }

    protected function storeCookie(): void
    {
        Cookie::queue($this->name, $this->cart->toJson(), 60 * 24 * 7);
    }

    protected function checkDiscountValidate($item, $discount)
    {
//        dd($discount);
        $discount = Discount::where('id' , $discount)->first();
//        dd($discount->percent);
        if($discount && $discount->expired_at > now() ) {
            if(
                (  ! $discount->products->count() && ! $discount->categories->count() ) ||
                in_array( $item['product']->id , $discount->products->pluck('id')->toArray() ) ||
                array_intersect($item['product']->categories->pluck('id')->toArray() , $discount->categories->pluck('id')->toArray())
            ) {
                $item['discount_percent'] = $discount->percent / 100;
            }
        }
//dd($item);
        return $item;
    }
}
