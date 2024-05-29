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
    <h1 class="text-center">Table Product</h1>
    <form action="/product/update/{{$product->product_id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama_product" class="form-label">Nama Product</label>
            <input type="text" class="form-control" name="nama_product" id="nama_product"
                placeholder="Input Nama Product" value="{{$product->nama_product}}">
        </div>
        <div class="mb-3">
            <label for="kategori_product" class="form-label">Kategori Product</label>
            <input type="text" class="form-control" name="kategori_product" id="kategori_product"
                placeholder="Input Kategori Product" value="{{$product->kategori_product}}">
        </div>
        <div class="mb-3">
            <label for="gambar_product" class="form-label">Gambar Product</label>
            <img src="{{ Storage::url($product->gambar_product)}}" alt="" class="img-fluid" width="100">
            <input type="file" class="form-control" name="gambar_product" id="gambar_product" value="{{$product->gambar_product}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" cols="30" rows="10" placeholder="Description">{{$product->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" id="price"
                placeholder="Input price" value="{{$product->price}}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" name="status" id="status"
                placeholder="Input status" value="{{$product->status}}">
        </div>
        
 
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection