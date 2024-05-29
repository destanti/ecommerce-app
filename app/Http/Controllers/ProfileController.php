<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    public function index()
    {
        return view('frontend.profile.index');
    }

    public function update(Request $request, User $user)
    {
     //Proses insert ke table
    
     $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:100',
        'password' => 'nullable',
        'email' => 'required',
        'phone_number' => 'required',
        'address' => 'required',
        
    ]);
    // jika validasi atau aturan inputan form tidak sesuai maka
    if ($validator->fails()) {
        // akan kembali ke route / tampilan sebelumnya dengan membawa error nya apa
        return back()->withInput()->withErrors($validator->messages());
    }
    $data = $request->all();
    unset($data['password']);
    if ($request->password) {
        $data['password'] = $request->password;
    }
    // perintah untuk memasukkan ke table
    $user->update($data);
    if ($user) {
        return redirect()->to('/profile')->withSuccess('Update Successful');
    } else {
        return back()->withInput()->withErrors('Update Failed');
    }
    }
}
