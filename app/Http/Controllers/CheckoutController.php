<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\About;
use App\Models\Sosmed;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $where = [
            'user_id' => Auth::id(),
            'invoice_code' => NULL,
        ];

        $data = [
            'about' => About::first(),
            'sosmed' => Sosmed::all(),
            'subtotal' => $request->subtotal,
            'discount' => $request->discount,
            'cart' => Cart::where($where)->get(),
        ];
        return view('frontend.checkout.index', $data);
    }

    public function invoice(Checkout $checkout)
    {
        $data = [
            'checkout'=> $checkout,
            'about' => About::first(),
        ];
        return view('frontend.invoice.index', $data);
    }

    public function store(Request $request)
    {
        $where = [
            'user_id' => Auth::id(),
            'invoice_code' => NULL,
        ];

        $invoice_code = now()->format('Y-M-d') . Str::random(6) . now()->format('HIs');

        $checkout = Checkout::create([
            'invoice_code' => $invoice_code,
            'user_id' => Auth::id(),
            'total' => $request->total,
            'payment' => $request->payment,
            'coupon' => $request->discount,
            'status' => 'pending payment',
        ]);

        if ($checkout) {
            Cart::where($where)->update(['invoice_code' => $invoice_code]);
            return redirect()->to('/invoice/'.$invoice_code);
        
        } else {
            return back()->withErrors('Checkout Gagal!');
        }
    }
}
