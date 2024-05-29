<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $where = [
            'user_id' => Auth::id(),
            'invoice_code' => NULL,
        ];

        $data = [
            'about' => About::first(),
            'sosmed' => Sosmed::all(),
            /* manggil data cart dengan kondisi variable where dalam case ini 
            user yang sudah log in dan invoice code null */
            'cart' => Cart::where($where)->get(),
        ];
        return view('frontend.cart.index', $data);
    }

    public function add(Request $request)
    {
        /* untuk cek apakah barangnya udah masuk ke cart atau belum dan ketiga komponen ini sudah terpenuhi, 
        kalau belum ada tandanya harus tambah data baru atau update */

        $where = [
            'user_id' => Auth::id(),
            'menu_id' => $request->menu_id,
            'invoice_code' => NULL,
        ];
        $cart = Cart::where($where)->first();

        /* if yang pertama untuk update cart */
        if ($cart) {
            $cart->qty = $cart->qty + 1;
            $cart->total_harga = $request->total_harga * $cart->qty;
            $cart->save();
            /* else yang pertama untuk menambah cart */
        } else {
            $cart = Cart::create([
                'user_id' => Auth::id(),
                'menu_id' => $request->menu_id,
                'qty' => 1,
                'total_harga' => $request->total_harga
            ]);
        }
        /* if yang kedua untuk mengirimkan pesan update cart sukses atau error */
        if ($cart) {
            return response()->json([
                'success' => true,
                'messages' => 'Item berhasil ditambahkan'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'messages' => 'Item gagal ditambahkan'
            ]);
        }
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        if ($cart) {
            return back()->withSuccess([
                'success' => true,
                'messages' => 'Item berhasil dihapus'
            ]);
        } else {
            return back()->withErrors([
                'success' => false,
                'messages' => 'Item gagal dihapus'
            ]);
        }
    }

    public function qty(Request $request)
    {
        $cart = Cart::find($request->cart_id)->update([
            'qty' => $request->qty,
            'total_harga' => $request->qty * $request->price,
        ]);

        if ($cart) {
            return response()->json([
                'success' => true,
                'messages' => 'Item berhasil diubah'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'messages' => 'Item gagal diubah'
            ]);
        }
    }

    public function subtotal()
    {
        $where = [
            'user_id' => Auth::id(),
            'invoice_code' => NULL,
        ];

        $subtotal = Cart::where($where)->sum('total_harga');
        return response()->json([
            'success' => true,
            'messages' => 'Data berhasil didapatkan',
            'data' => $subtotal,
        ]);
    }

    public function checkcoupon(string $coupon)
    {
        $coupon = Coupon::where('code', $coupon)->latest()->first();
        if ($coupon && $coupon->expired > now()) {
            return response()->json([
                'success' => true,
                'messages' => 'Coupon ditambahkan',
                'data' => $coupon,
            ]);
           
        } else {
            return response()->json([
                'success' => false,
                'messages' => 'Coupon tidak berlaku',
            ]);
           
        }
    }

    public function countCart(){
        $where = [
            'user_id' => Auth::id(),
            'invoice_code' => NULL,
        ];
        $countCart = Cart::where($where)->sum('qty');

        return response()->json([
            'success' => true,
            'messages' => 'Data berhasil didapatkan',
            'data' => $countCart,
        ]);

    }
}
