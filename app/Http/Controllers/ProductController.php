<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //Proses insert ke table
    $validator = Validator::make($request->all(), [
        'nama_product' => 'required',
        'kategori_product' => 'required',
        'gambar_product' => 'nullable|mimes:png,jpg,jpeg',
        'description' => 'required',
        'price' => 'required',
        'status' => 'required',
    ]);
    // jika validasi atau aturan inputan form tidak sesuai maka
    if ($validator->fails()) {
        // akan kembali ke route / tampilan sebelumnya dengan membawa error nya apa
        return back()->withInput()->withErrors($validator->messages());
    }
    // untuk mengambil data request/masukkan dari form selain gambar
    $datatableproduct = $request->all();
    // dd($datatableproduct);

    // untuk fungsi hasFile untuk random nama gambar agar tidak sama
    if ($request->hasFile('gambar_product')) {
        // untuk mengambil request/masukan file gambar
        $aboutproduct = $request->file('gambar_product');

        // disini akan disimpan di storage laravel di public/gambar
        $datatableproduct['gambar_product'] = Storage::putFile('public/product', $aboutproduct);
    }
    
    $insertproduct = Product::create($datatableproduct);

    if ($insertproduct) {
        return redirect()->to('/product')->withSuccess('Insert Successful');
    } else {
        return back()->withInput()->withErrors('Insert Failed');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'nama_product' => 'required',
            'kategori_product' => 'required',
            'gambar_product' => 'nullable|mimes:png,jpg,jpeg',
            'description' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);
        // jika validasi atau aturan inputan form tidak sesuai maka
        if ($validator->fails()) {
            // akan kembali ke route / tampilan sebelumnya dengan membawa error nya apa
            return back()->withInput()->withErrors($validator->messages());
        }
        // untuk mengambil data request/masukkan dari form selain gambar
        $datatableproduct = $request->all();
    
        // untuk fungsi hasFile untuk random nama gambar agar tidak sama
        if ($request->hasFile('gambar_product')) {
            if ($product->gambar_product != NULL && Storage::get($product->gambar_product)) {
                Storage::delete($product->gambar_product);
            }
            // untuk mengambil request/masukan file gambar
            $aboutproduct = $request->file('gambar_product');
    
            // disini akan disimpan di storage laravel di public/gambar
            $datatableproduct['gambar_product'] = Storage::putFile('public/product', $aboutproduct);
        }
        
        $product->update($datatableproduct);
    
        if ($product) {
            return redirect()->to('/product')->withSuccess('Update Successful');
        } else {
            return back()->withInput()->withErrors('Update Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (!is_null($product->gambar_product) && Storage::exists($product->gambar_product)) {
            Storage::delete($product->gambar_product);
        }
        $product->delete();
        if ($product) {
            return Redirect()->to('/product')->withSuccess('Delete Successful');
        } else {
            return back()->withInput()->withErrors('Delete Failed');
        }
    }
}
