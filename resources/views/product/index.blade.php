@extends('layoutadmin')
@section('title')
    Danh sách sản phẩm
@endsection
@section('content')
    <a href="{{ route('product.create') }}" class="btn btn-success">Thêm mới</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">price</th>
            <th scope="col">quantity</th>
            <th scope="col">image</th>
            <th scope="col">category name</th>
            <th scope="col">status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $item)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->quantity }}</td>
            <td>
                @if(!isset($item->image))
                    Không có hình ảnh
                @else
                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" style="max-width: 100px;">
                @endif
            </td>
            <td>{{ $item->category->name }}</td>
            <td>{{ $item->status }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection