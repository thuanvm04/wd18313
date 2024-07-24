<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = (new Product())->loadDataWithPager();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
        ], [
            'name.required' => 'Trường tên không được bỏ trống',
            'name.string' => 'Tên bắt buộc là chuỗi',
            'name.max' => 'Trường tên không được vượt quá 255 ký tự',
            'price.required' => 'Giá sản phẩm không được bỏ trống',
            'price.numeric' => 'Giá sản phẩm phải là số',
            'price.min' => 'Giá sản phẩm không được âm',
            'quantity.required' => 'Số lượng không được bỏ trống',
            'quantity.integer' => 'Số lượng phải là số nguyên',
            'quantity.min' => 'Số lượng không được âm',
            'image.required' => 'Hình ảnh không được bỏ trống',
            'image.image' => 'File phải là hình ảnh',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif',
            'image.max' => 'Kích thước hình ảnh không được vượt quá 2MB',
            'category_id.required' => 'Danh mục không được bỏ trống',
            'category_id.exists' => 'Danh mục không tồn tại',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = 'images/' . $imageName;
        }

        Product::create($validatedData);

        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được thêm thành công.');
    }

    // Các phương thức khác giữ nguyên
}