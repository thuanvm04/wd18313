@extends('layoutadmin')
@section('title')
    Danh sách danh mục
@endsection
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('category.create') }}" class="btn btn-success mb-3">Thêm mới</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên danh mục</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Ngày cập nhật</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->name }}</td>
            <td>{{ $category->status ? 'Hoạt động' : 'Không hoạt động' }}</td>
            <td>{{ $category->created_at }}</td>
            <td>{{ $category->updated_at }}</td>
            <td>
                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection