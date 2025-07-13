@extends('component.app')
@section('content')
<div>
    <form action="{{ route('Product.update', $product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="">Image</label>
            <input type="file" name="ProductImage">
        </div>
        <div>
            <label for="">Title</label>
            <input type="text" name="ProductTitle">
        </div>
        <div>
            <label for="">Desciption</label>
            <input type="text" name="ProductDescription">
        </div>
        <div>
            <label for="">Price</label>
            <input type="number" name="ProductPrice">
        </div>
        <div>
            <button type="submit">Simpan</button>
            <button type="reset">Reset</button>
        </div>
    </form>
</div>
@endsection