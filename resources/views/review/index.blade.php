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

        <table id="myTable" class="table table-hover table-primary-subtle">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Email</th>
                    <th scope="col">Product</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($review as $r)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- untuk membuat nomer berurutan --}}
                        <td>{{ $r->name }}</td>
                        <td>{{ $r->email }}</td>
                        <td>{{ $r->product->nama_product }}</td>
                        <td>
                            @if ($r->status == 'unread')
                                <center><i class="bi bi-envelope-exclamation text-primary" style="font-size: 1.5rem"></i>
                                </center>
                            @else
                                <center><i class="bi bi-envelope-open text-secondary" style="font-size: 1.5rem"></i>
                                </center>
                            @endif

                        </td>
                        <td>{{ $r->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="/review/destroy/{{ $r->review_id }}" class="btn btn-danger"
                                onclick="return confirm('Are you sure want to delete?')">Hapus</a>
                            <a href="/review/show/{{ $r->review_id }}" class="btn btn-success">Detail</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
