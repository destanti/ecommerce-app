@extends('layouts.index')
@section('content')

    <div>
        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><strong>{{ $error }}</strong></li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h1 class="text-center">Table Coupon</h1>
        <form action="/checkout/update/{{$checkout->invoice_code}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="invoice_code" class="form-label">Invoice Code</label>
                <input type="text" class="form-control" name="invoice_code" id="invoice_code" 
                placeholder="Invoice Code" value="{{$checkout->invoice_code}}">
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">Discount</label>
                <input type="text" class="form-control" name="user_id" id="user_id" 
                placeholder="User ID" value="{{$checkout->user_id}}">
            </div>
            <div class="mb-3">
                <label for="total" class="form-label">Total Harga</label>
                <input type="number" class="form-control" name="total" id="total" 
                placeholder="Total harga" value="{{$checkout->total}}">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" name="status" id="status" 
                placeholder="Status" value="{{$checkout->status}}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
