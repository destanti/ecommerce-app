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
        <h1 class="text-center">Table Category</h1><br>
        <a href="/category/create" class="btn btn-primary">Add</a><br>
        <table class="table table-hover table-primary-subtle">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category</th> 
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $c)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- untuk membuat nomer berurutan --}}
                        <td>{{ $c->category}}</td>
                      
                        <td>
                            <a href="/category/destroy/{{ $c->category_id }}" class="btn btn-danger"
                                onclick="return confirm('Are you sure want to delete?')">Hapus</a>
                            <a href="/category/edit/{{ $c->category_id }}" class="btn btn-success">Edit</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
