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
        <h1 class="text-center">Table Product</h1><br>
        <a href="/product/create" class="btn btn-primary">Add</a><br>
        <table  id="myTable" class="table table-hover table-primary-subtle">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Product</th>
                    <th scope="col">Kategori Product</th>
                    <th scope="col">Gambar Product</th>
                    <th scope="col">Decsription</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- untuk membuat nomer berurutan --}}
                        <td>{{ $p->nama_product }}</td>
                        <td>{{ $p->kategori_product }}</td>
                        <td><img src="{{Storage::url($p->gambar_product)}}" class="img-rounded" width="150" alt=""></td>
                        <td>{{ $p->description }}</td>
                        <td>{{ $p->price }}</td>
                        <td>{{ $p->status }}</td>
                       
                        <td>
                            <a href="/product/destroy/{{ $p->product_id }}" class="btn btn-danger"
                                onclick="return confirm('Are you sure want to delete?')">Hapus</a>
                            <a href="/product/edit/{{ $p->product_id }}" class="btn btn-success">Edit</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
