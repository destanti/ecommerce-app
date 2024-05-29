<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\About;
use App\Models\Sosmed;
use App\Models\Product;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    public function index()
    {
        $data = [
            'about' => About::first(),
            'sosmed' => Sosmed::all(),
            'retail' => Product::where(['kategori_product' => 'makanan'])->orWhere('kategori_product', 'minuman')->whereNotIn('status', ['sold out'])->get(),
            'segar' => Product::where('kategori_product', 'buah')->orWhere('kategori_product', 'sayur')->whereNotIn('status', ['sold out'])->get(),

        ];

        return view('frontend.layouts.index', $data);
    }

    public function login()
    {
        return view('frontend.login.index');
    }

    public function authenticateCustomer(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // dd($request->session()->regenerate());

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logoutCustomer(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function register(Request $request)
    {
        //Proses insert ke table
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'password' => 'required',
            'email' => 'required',

        ]);
        // jika validasi atau aturan inputan form tidak sesuai maka
        if ($validator->fails()) {
            // akan kembali ke route / tampilan sebelumnya dengan membawa error nya apa
            return back()->withInput()->withErrors($validator->messages());
        }
        // menambah atribut di dalam variable array request all khusus untuk resgiter customer
        $data = $request->all();
        $data['rules'] = 'customer';

        // perintah untuk memasukkan ke table
        $user = User::create($data);
        if ($user) {
            return back()->withSuccess('Insert Successful');
        } else {
            return back()->withInput()->withErrors('Error');
        }
    }

    public function katalog ($kategori)
    {
        $data = [
            'about' => About::first(),
            'sosmed' => Sosmed::all(),
            'product' => Product::where('kategori_product', $kategori)->whereNotIn('status', ['sold out'])->get(),
            'kategori' => Product::select('kategori_product',DB::raw('count(*) as total'))->groupBy('kategori_product')->get(),
            'new_product' => Product::latest()->limit(3)->get(),

        ];
        
        return view('frontend.katalog.index', $data);
    }

    public function promo()
    {
        $data = [
            'about' => About::first(),
            'sosmed' => Sosmed::all(),
            

        ];
        return view('frontend.promo.index', $data);
    }

    
    public function detail (Product $product)
    {
        $data = [
            'about' => About::first(),
            'sosmed' => Sosmed::all(),
            'product' => $product,
            'kategori' => Product::select('kategori_product',DB::raw('count(*) as total'))->groupBy('kategori_product')->get(),
            'new_product' => Product::latest()->limit(3)->get(),
            'related' => Product::where('kategori_product',$product->kategori_product)->whereNotIn('status', ['sold out'])->get(),
        ];
        
        return view('frontend.detail.index', $data);
    }

    public function history()
    {
        $data = [
            'about' => About::first(),
            'sosmed' => Sosmed::all(),
            'invoice' => Checkout::where('user_id',Auth::id())->get(),

        ];
        return view('frontend.history.index', $data);
    }

    public function search ($search)
    {
        $data = [
            'about' => About::first(),
            'sosmed' => Sosmed::all(),
            'product' => Product::where('nama_product','LIKE','%'.$search.'%')->orWhere('kategori_product','LIKE','%'.$search.'%')->get(),
            'new_product' => Product::latest()->limit(3)->get(),

        ];
        
        return view('frontend.search.index', $data);
    }


}
