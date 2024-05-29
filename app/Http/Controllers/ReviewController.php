<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review = Review::all();
        return view('review.index', compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Proses insert ke table
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required',
            'message' => 'required',
            'product_id' => 'required',
        ]);
        // jika validasi atau aturan inputan form tidak sesuai maka
        if ($validator->fails()) {
            // akan kembali ke route / tampilan sebelumnya dengan membawa error nya apa
            return back()->withInput()->withErrors($validator->messages());
        }
        // perintah untuk memasukkan ke table
        $data = $request->all();
        $data['status'] = 'unread';
        $review = Review::create($data);
        if ($review) {
            return back()->withSuccess('Insert Successful');
        } else {
            return back()->withInput()->withErrors('Insert Failed');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        $review->status='read';
        $review->save();
        return view('review.detail', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        if ($review) {
            return redirect()->to('/review')->withSuccess('Delete Successful');
        } else {
            return back()->withInput()->withErrors('Delete Failed');
        }
    }
}
