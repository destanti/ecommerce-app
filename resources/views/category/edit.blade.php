@extends('layouts.index')
@section('content')

<div >
    @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li><strong>{{$error}}</strong></li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> </div>
    @endif
    <h1 class="text-center">Table Category</h1>
    <form action="/category/update/{{$category->category_id}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="category" class="form-label">category</label>
            <input type="text" class="form-control" name="category" id="category"
                placeholder="Input Category" value="{{$category->category}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection