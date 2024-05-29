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
        <form action="/coupon/update/{{$coupon->coupon_id}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Coupon Code</label>
                <input type="text" class="form-control" name="code" id="code" 
                placeholder="Input Coupon Code" value="{{$coupon->code}}">
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="number" class="form-control" name="discount" id="discount" 
                placeholder="Input Discount" value="{{$coupon->discount}}">
            </div>
            <div class="mb-3">
                <label for="expired" class="form-label">Expired Date</label>
                <input type="date" class="form-control" name="expired" id="expired" 
                placeholder="Input Expired" value="{{$coupon->expired}}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
