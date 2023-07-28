<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\carrito;
class StripeController extends Controller
{
    //


    public function checkout()
    {
        return view('checkout');
    }

    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51NYepyKgyFaUBIjVNIxXVw7Vw79LBF7QhoE9LISgXAoolRMiRa61QFWxF6624EqK6mQtzQIug12lic3jZlKWBh3Q00JDJu5sGy');
        $c = carrito::where('id', $request->carrito)->first();
        $cid = $c->id;
        $totalprice = (int)($c->total/7);
        $two0 = "00";
        $total = "$totalprice$two0";

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            "name" => 'Compra Gamer',
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],

            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('carrito.index'),
        ]);

        return redirect()->away($session->url);
    }


    public function success()
    {

        $c =  carrito::where('cliente_id', auth()->user()->id)->first();
        return view('continuar',compact('c'));
    }
}
