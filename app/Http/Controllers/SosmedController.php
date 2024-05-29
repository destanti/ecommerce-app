<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sosmed = Sosmed::all();
        return view('sosmed.index', compact('sosmed'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sosmed.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //Proses insert ke table
    $validator = Validator::make($request->all(), [
        'nama_sosmed' => 'required|string|max:100',
        'link_sosmed' => 'required',
        'icon_sosmed' => 'required',
    ]);
    // jika validasi atau aturan inputan form tidak sesuai maka
    if ($validator->fails()) {
        // akan kembali ke route / tampilan sebelumnya dengan membawa error nya apa
        return back()->withInput()->withErrors($validator->messages());
    }
    // perintah untuk memasukkan ke table
    $sosmed = Sosmed::create($request->all());
    if ($sosmed) {
        return redirect()->to('/sosmed')->withSuccess('Insert Successful');
    } else {
        return back()->withInput()->withErrors('Insert Failed');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sosmed $sosmed)
    {
        return view('sosmed.edit', compact('sosmed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sosmed $sosmed)
    {
     //Proses insert ke table
     $validator = Validator::make($request->all(), [
        'nama_sosmed' => 'required|string|max:100',
        'link_sosmed' => 'required',
        'icon_sosmed' => 'required',
    ]);
    // jika validasi atau aturan inputan form tidak sesuai maka
    if ($validator->fails()) {
        // akan kembali ke route / tampilan sebelumnya dengan membawa error nya apa
        return back()->withInput()->withErrors($validator->messages());
    }
    // perintah untuk memasukkan ke table
    $sosmed->update($request->all());
    if ($sosmed) {
        return redirect()->to('/sosmed')->withSuccess('Update Successful');
    } else {
        return back()->withInput()->withErrors('Update Failed');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sosmed $sosmed)
    {
        $sosmed->delete();
        if ($sosmed) {
            return redirect()->to('/sosmed')->withSuccess('Delete Successful');
        } else {
            return back()->withInput()->withErrors('Delete Failed');
        }
    }
}
