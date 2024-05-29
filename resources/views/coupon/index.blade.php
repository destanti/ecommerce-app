@extends('layouts.index')
@section('content')
    <div >
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
        @endif
        <h1 class="text-center">Table Coupon</h1><br>
        <a href="/coupon/create" class="btn btn-primary">Add</a><br>
        <table id="myTable" class="table table-hover table-primary-subtle">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Code</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Expired</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coupon as $c)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- untuk membuat nomer berurutan --}}
                        <td>{{ $c->code }}</td>
                        <td>{{ $c->discount }}</td>
                        <td>{{ $c->expired }}</td>
                        <td>
                            <a href="/coupon/destroy/{{ $c->coupon_id }}" class="btn btn-danger"
                                onclick="return confirm('Are you sure want to delete?')">Hapus</a>
                            <a href="/coupon/edit/{{ $c->coupon_id }}" class="btn btn-success">Edit</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
