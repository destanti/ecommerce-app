@extends('layouts.index')
@section('content')

<div class="container">
    @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li><strong>{{$error}}</strong></li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
    </div>
    @endif
    <h1 class="text-center">Table Sosmed</h1>
    <form action="/sosmed/update/{{$sosmed->sosmed_id}}" method="POST">

        @csrf
        <div class="mb-3">
            <label for="nama_sosmed" class="form-label">Nama Sosmed</label>
            <input type="text" class="form-control" name="nama_sosmed" id="nama_sosmed"
                placeholder="Input Nama Sosmed" value="{{$sosmed->nama_sosmed}}">
        </div>
        <div class="mb-3">
            <label for="link_sosmed" class="form-label">Link</label>
            <input type="url" class="form-control" name="link_sosmed" id="link_sosmed"
                placeholder="Link" value="{{$sosmed->link_sosmed}}">
        </div>
        <div class="mb-3">
            <label for="icon_sosmed" class="form-label">Icon</label>
            <input type="icon" class="form-control" name="icon_sosmed" id="icon_sosmed"
                placeholder="Icon" value="{{$sosmed->icon_sosmed}}">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

    
@endsection