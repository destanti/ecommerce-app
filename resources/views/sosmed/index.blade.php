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
        <h1 class="text-center">Table Sosmed</h1><br>
        <a href="/sosmed/create" class="btn btn-primary">Add</a><br>
        <table id="myTable" class="table table-hover table-primary-subtle">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Sosmed</th>
                    <th scope="col">Link</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sosmed as $s)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- untuk membuat nomer berurutan --}}
                        <td>{{ $s->nama_sosmed }}</td>
                        <td>{{ $s->link_sosmed }}</td>
                        <td><i class="{{ $s->icon_sosmed }}" style="font-size: 12px"></i></td>
                        <td>
                            <a href="/sosmed/destroy/{{ $s->sosmed_id }}" class="btn btn-danger"
                                onclick="return confirm('Are you sure want to delete?')">Hapus</a>
                            <a href="/sosmed/edit/{{ $s->sosmed_id }}" class="btn btn-success">Edit</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
