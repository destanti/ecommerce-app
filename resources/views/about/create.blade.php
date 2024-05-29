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
    <h1 class="text-center">Table About</h1>
    <form action="/about/store" method="POST" enctype="multipart/form-data">
        @csrf
       
        <div class="mb-3">
            <label for="logo" class="form-label">File Logo</label>
            <input type="file" class="form-control" name="logo" id="logo">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" class="form-control" name="phone" id="phone"
                placeholder="Input phone number">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" id="address"
                placeholder="Input address">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email"
                placeholder="Input email">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" cols="30" rows="10" placeholder="Description"></textarea>
        </div>
 
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection