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
        <h1 class="text-center">Table About</h1><br>
        <a href="/about/create" class="btn btn-primary">Add</a><br>
        <table id="myTable" class="table table-hover table-primary-subtle">
            <thead>
                <tr>
                    
                    <th scope="col">Logo</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Description</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($about as $a)
                    <tr>
                        <td><img src="{{Storage::url($a->logo)}}" class="img-rounded" width="150" alt=""></td>
                        <td>{{ $a->phone }}</td>
                        <td>{{ $a->address }}</td>
                        <td>{{ $a->email }}</td>
                        <td>{{ $a->description }}</td>
                        
                        <td>
                            <a href="/about/destroy/{{ $a->about_id }}" class="btn btn-danger"
                                onclick="return confirm('Are you sure want to delete?')">Hapus</a>
                            <a href="/about/edit/{{ $a->about_id  }}" class="btn btn-success">Edit</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
