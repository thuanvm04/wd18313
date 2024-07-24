<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10); // Số 10 có thể điều chỉnh tùy theo nhu cầu
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'status' => 'required|boolean',
        ], [
            'name.required' => 'Tên danh mục không được để trống',
            'name.string' => 'Tên danh mục phải là chuỗi ký tự',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'status.required' => 'Trạng thái không được để trống',
            'status.boolean' => 'Trạng thái không hợp lệ',
        ]);

        Category::create($validated);

        return redirect()->route('category.index')->with('success', 'Danh mục đã được tạo thành công.');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'status' => 'required|boolean',
        ], [
            'name.required' => 'Tên danh mục không được để trống',
            'name.string' => 'Tên danh mục phải là chuỗi ký tự',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'status.required' => 'Trạng thái không được để trống',
            'status.boolean' => 'Trạng thái không hợp lệ',
        ]);

        $category->update($validated);

        return redirect()->route('category.index')->with('success', 'Danh mục đã được cập nhật thành công.');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Danh mục đã được xóa thành công.');
    }
}