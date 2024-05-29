<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::all();
        return view('about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //Proses insert ke table
    $validator = Validator::make($request->all(), [
        'logo' => 'nullable|mimes:png,jpg,jpeg',
        'phone' => 'required',
        'address' => 'required',
        'email' => 'required',
        'description' => 'required',
    ]);
    // jika validasi atau aturan inputan form tidak sesuai maka
    if ($validator->fails()) {
        // akan kembali ke route / tampilan sebelumnya dengan membawa error nya apa
        return back()->withInput()->withErrors($validator->messages());
    }
    // untuk mengambil data request/masukkan dari form selain gambar
    $datatableabout = $request->all();

    // untuk fungsi hasFile untuk random nama gambar agar tidak sama
    if ($request->hasFile('logo')) {
        // untuk mengambil request/masukan file gambar
        $aboutlogo = $request->file('logo');

        // disini akan disimpan di storage laravel di public/gambar
        $datatableabout['logo'] = Storage::putFile('public/about', $aboutlogo);
    }
    
    $insertabout = About::create($datatableabout);

    if ($insertabout) {
        return redirect()->to('/about')->withSuccess('Insert Successful');
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
    public function edit(About $about)
    {
        return view('about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
    //Proses insert ke table
    $validator = Validator::make($request->all(), [
        'logo' => 'nullable|mimes:png,jpg,jpeg',
        'phone' => 'required',
        'address' => 'required',
        'email' => 'required',
        'description' => 'required',
    ]);
    // jika validasi atau aturan inputan form tidak sesuai maka
    if ($validator->fails()) {
        // akan kembali ke route / tampilan sebelumnya dengan membawa error nya apa
        return back()->withInput()->withErrors($validator->messages());
    }
    // untuk mengambil data request/masukkan dari form selain gambar
    $datatableabout = $request->all();

    // untuk fungsi hasFile untuk random nama gambar agar tidak sama
    if ($request->hasFile('logo')) {
        if ($about->logo != NULL && Storage::get($about->logo)) {
            Storage::delete($about->logo);
        }
        // untuk mengambil request/masukan file gambar
        $aboutlogo = $request->file('logo');

        // disini akan disimpan di storage laravel di public/gambar
        $datatableabout['logo'] = Storage::putFile('public/about', $aboutlogo);
    }
    
    $about->update($datatableabout);

    if ($about) {
        return redirect()->to('/about')->withSuccess('Update Successful');
    } else {
        return back()->withInput()->withErrors('Update Failed');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
       
        if (!is_null($about->logo) && Storage::exists($about->logo)) {
            Storage::delete($about->logo);
        }
        $about->delete();
        if ($about) {
            return Redirect()->to('/about')->withSuccess('Delete Successful');
        } else {
            return back()->withInput()->withErrors('Delete Failed');
        }
    }
}
