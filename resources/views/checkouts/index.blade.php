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
        <h1 class="text-center">Table Invoice</h1><br>
        <table id="myTable" class="table table-hover table-primary-subtle">
            <thead>
                <tr>
                    <th scope="col">Invoice Code</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Date/Time</th>
                    <th scope="col">Status</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($checkout as $c)
                    <tr>
                        <td>{{ $c->invoice_code }}</td>
                        <td>{{ $c->user->name}}</td>
                        <td>@rupiah($c->total)</td>
                        <td>{{ $c->created_at->format('Y M d/ H:I:s') }}</td>
                        <td class="text-uppercase">{{ $c->status }}</td>
                        <td>
                            <a href="/checkouts/destroy/{{ $c->invoice_code }}" class="btn btn-danger"
                                onclick="return confirm('Are you sure want to delete?')">Hapus</a>
                            <a href="/checkouts/show/{{ $c->invoice_code }}" class="btn btn-success">Detail</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
