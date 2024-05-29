<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkout = Checkout::latest()->get();
        // menampilkan data yang paling terbaru masuk
        return view('checkouts.index', compact('checkout'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Checkout $checkout)
    {
        return view('checkouts.detail', compact('checkout'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkout $checkout)
    {
        return view('checkouts.detail', compact('checkout'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkout $checkout)
    {
        //Proses insert ke table
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'total' => 'required',
            'status' => 'required',
        ]);
        // jika validasi atau aturan inputan form tidak sesuai maka
        if ($validator->fails()) {
            // akan kembali ke route / tampilan sebelumnya dengan membawa error nya apa
            return back()->withInput()->withErrors($validator->messages());
        }
        // perintah untuk memasukkan ke table
        $checkout->update($request->all());
        if ($checkout) {
            return redirect()->to('/')->withSuccess('Update Successful');
        } else {
            return back()->withInput()->withErrors('Update Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkout $checkout)
    {
        $checkout->delete();
        if ($checkout) {
            return redirect()->to('/checkouts')->withSuccess('Delete Successful');
        } else {
            return back()->withInput()->withErrors('Delete Failed');
        }
    }

    public function updateStatus(Request $request)
    {
        if ($request->status) {
            $checkout = Checkout::find($request->invoice_code)->update(['status' => $request->status]);
            if ($checkout) {
                return back()->withSuccess('PAID');
            } else {
                return back()->withErrors('PENDING PAYMENT');
            }
        } else {
            return back()->withErrors('status required');
        }
    }
}
