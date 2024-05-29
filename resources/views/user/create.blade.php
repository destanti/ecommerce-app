@extends('layouts.index')
@section('content')

<div >
    @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li><strong>{{$error}}</strong></li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> </div>
    @endif
    <h1 class="text-center">Table Database User</h1>
    <form action="/user/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Username</label>
            <input type="text" class="form-control" name="name" id="name"
                placeholder="Input Nama User">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" name="password" id="password"
                placeholder="Input Password">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email"
                placeholder="Input Email">
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone number</label>
            <input type="number" class="form-control" name="phone_number" id="phone_number"
                placeholder="Input phone number">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" id="address"
                placeholder="Input address">
        </div>
        <div class="mb-3">
            <label for="rules" class="form-label">Rules</label>
            <input type="text" class="form-control" name="rules" id="rules"
                placeholder="Input rules">
        </div>
        
 
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection