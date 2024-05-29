<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('User.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //Proses insert ke table
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:100',
        'password' => 'required',
        'email' => 'required',
        'phone_number' => 'nullable',
        'address' => 'nullable',
        'rules' => 'required',
    ]);
    // jika validasi atau aturan inputan form tidak sesuai maka
    if ($validator->fails()) {
        // akan kembali ke route / tampilan sebelumnya dengan membawa error nya apa
        return back()->withInput()->withErrors($validator->messages());
    }
    // perintah untuk memasukkan ke table
    $user = User::create($request->all());
    if ($user) {
        return redirect()->to('/user')->withSuccess('Insert Successful');
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
    public function edit(User $user)
    {
        return view('User.edit', compact('User'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
     //Proses insert ke table
     $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:100',
        'password' => 'required',
        'email' => 'required',
        'phone_number' => 'nullable',
        'address' => 'nullable',
        'rules' => 'required',
    ]);
    // jika validasi atau aturan inputan form tidak sesuai maka
    if ($validator->fails()) {
        // akan kembali ke route / tampilan sebelumnya dengan membawa error nya apa
        return back()->withInput()->withErrors($validator->messages());
    }
    // perintah untuk memasukkan ke table
    $user->update($request->all());
    if ($user) {
        return redirect()->to('/user')->withSuccess('Update Successful');
    } else {
        return back()->withInput()->withErrors('Update Failed');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        if ($user) {
            return redirect()->to('/user')->withSuccess('Delete Successful');
        } else {
            return back()->withInput()->withErrors('Delete Failed');
        }
    }
}
