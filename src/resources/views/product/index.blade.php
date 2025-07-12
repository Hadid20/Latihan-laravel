@extends('component.app')
@section('content')
<div>
    <a href="{{ route('Product.create') }}">Buat Data</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($data as $item)
        <tr>
            <td><img src="{{ asset('storage/Image/'. $item->ProductImage) }}" alt=""></td>
            <td>{{ $item->ProductTitle }}</td>
            <td>{{ $item->ProductDescription }}</td>
            <td>{{ $item->ProductPrice }}</td>
            <td>
                <a href="{{ route('Product.show', $item) }}">lihat detail</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">data kosong</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
