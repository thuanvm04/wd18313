@extends('layoutadmin')
@section('title')
    Thêm mới sản phẩm
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Nguyễn Văn A" value="{{ old('name') }}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" name="price" placeholder="10000" value="{{ old('price') }}">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="text" class="form-control" name="quantity" placeholder="100" value="{{ old('quantity') }}">
            @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select mb-3" name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Gửi</button>
        <a class="btn btn-light" href="{{ route('product.index') }}">Quay lại trang chủ</a>
    </form>
@endsection