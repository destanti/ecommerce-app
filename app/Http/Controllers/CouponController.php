<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupon = Coupon::all();
        return view('coupon.index', compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //Proses insert ke table
    $validator = Validator::make($request->all(), [
        'code' => 'required|string|max:100',
        'discount' => 'required',
        'expired' => 'required',
    ]);
    // jika validasi atau aturan inputan form tidak sesuai maka
    if ($validator->fails()) {
        // akan kembali ke route / tampilan sebelumnya dengan membawa error nya apa
        return back()->withInput()->withErrors($validator->messages());
    }
    // perintah untuk memasukkan ke table
    $coupon = Coupon::create($request->all());
    if ($coupon) {
        return redirect()->to('/coupon')->withSuccess('Insert Successful');
    } else {
        return back()->withInput()->withErrors('Insert Failed');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        return view('coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|string|max:100',
            'discount' => 'required',
            'expired' => 'required',
        ]);
        // jika validasi atau aturan inputan form tidak sesuai maka
        if ($validator->fails()) {
            // akan kembali ke route / tampilan sebelumnya dengan membawa error nya apa
            return back()->withInput()->withErrors($validator->messages());
        }
        // perintah untuk memasukkan ke table
        $coupon->update($request->all());
        if ($coupon) {
            return redirect()->to('/coupon')->withSuccess('Update Successful');
        } else {
            return back()->withInput()->withErrors('Update Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        if ($coupon) {
            return redirect()->to('/coupon')->withSuccess('Delete Successful');
        } else {
            return back()->withInput()->withErrors('Delete Failed');
        }
    }
}
