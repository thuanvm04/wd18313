@extends('layoutadmin')
@section('title')
    Thêm mới danh mục
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

    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên danh mục</label>
            <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục" value="{{ old('name') }}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select class="form-select" name="status">
                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Không hoạt động</option>
            </select>
            @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a class="btn btn-light" href="{{ route('category.index') }}">Quay lại danh sách</a>
    </form>
@endsection