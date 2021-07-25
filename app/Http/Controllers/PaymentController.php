<?php
namespace App\Http\Controllers;
use App\Helpers\Cart\Cart;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as ShetabitPayment;

class PaymentController extends Controller
{
    public function shipping()
    {
        return view('shipping.shipping');
    }
    public function shippingComplete()
    {
       $orders = Order::where('user_id',auth()->user()->id )->latest()->first();
//       return $orders['status'];
        return view('shipping.shipping-complete',compact('orders'));
    }

    public function payment(Request $request)
    {
        $cart = Cart::instance('cart');
        $cartItem = $cart->all();
        if ($cartItem->count()){
            $price= $cartItem->sum(function ($cart){
                return $cart['discount_percent'] == 0
                    ? $cart['product']->price * $cart['quantity']
                    : ($cart['product']->price - ($cart['product']->price * $cart['discount_percent'])) * $cart['quantity'] ;
            });
            $orderItem = $cartItem->mapWithKeys(function ($cart){
                return [$cart['product']->id => ['quantity'=>$cart['quantity'],'color'=>$cart['color'],'size'=>$cart['size']]];
            });
            $order = auth()->user()->orders()->create([
               'status'=>'unpaid',
               'price'=>$price,

            ]);
            $order->products()->attach($orderItem);

             $invoice = (new Invoice)->amount($price);
//            $invoice = (new Invoice)->amount(1000);

            if ($request['pay_method'] == 'web'){
                return ShetabitPayment::callbackUrl(route('payment.callback'))->purchase($invoice, function($driver, $transactionId) use ($order, $cartItem ,$invoice) {

                    $order->payments()->create([
                        'resnumber' => $invoice->getUuid(),
                    ]);

                   return $cart->flush();

                })->pay()->render();

            }
            if ($request['pay_method'] == 'home'){
                $order->where('id',$order->id)->latest()->update([
                   'status'=>'home'
                ]);
            }

        }
        return redirect(route('shipping.complete'));
    }

    public function callback(Request $request)
    {
        try {
            $payment = Payment::where('resnumber', $request->clientrefid)->firstOrFail();

            // $payment->order->price
            $receipt = ShetabitPayment::amount($payment->order->price)->transactionId($request->clientrefid)->verify();

            $payment->update([
                'status' => 1
            ]);

            $payment->order()->update([
                'status' => 'paid'
            ]);

//            alert()->success('پرداخت شما موفق بود');
            return redirect(route('shipping.complete'));

        } catch (InvalidPaymentException $exception) {

            alert()->error($exception->getMessage());
            return redirect(route('shipping.complete'));
        }

    }

}
