@extends('layouts.index')
@section('content')
    <div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h1 class="text-center">Table Review</h1><br>

        <table class="table table-hover table-primary-subtle">

            <tbody>
               <tr>
                <th>Nama</th>
                <td>{{$review->name}}</td>
               </tr>
               <tr>
                <th>Email</th>
                <td>{{$review->email}}</td>
               </tr>
               <tr>
                <th>Product</th>
                <td>{{$review->product->nama_product}}</td>
               </tr>
               <tr>
                <th>Message</th>
                <td>{{$review->message}}</td>
               </tr>
            </tbody>
        </table>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    </div>
@endsection
