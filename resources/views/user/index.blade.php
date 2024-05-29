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
        <h1 class="text-center">Table Database User</h1><br>
        <a href="/user/create" class="btn btn-primary">Add</a><br>
        <table id="myTable" class="table table-hover table-primary-subtle">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Rules</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->name }}</td>
                        
                        <td>{{ $d->email }}</td>
                        <td>{{ $d->phone_number }}</td>
                        <td>{{ $d->address }}</td>
                        <td>{{ $d->rules }}</td>
                        <td>
                            <a href="/user/destroy/{{ $d->user_id }}" class="btn btn-danger"
                                onclick="return confirm('Are you sure want to delete?')">Hapus</a>
                            <a href="/user/edit/{{ $d->user_id  }}" class="btn btn-success">Edit</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
