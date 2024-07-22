<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/post', function () {
    // truy van lây tât
    $data = Post::all()->toArray();
    $data = Post::query()->get();
    // where
    $data = Post::query()
        ->where('id', '>=', '1' )
        ->get();
    // thêm
//    c1
//    $post = new Post();
//    $post->title = "bài viết số 2";
//    $post->content = "Nội dung bài viết số 2";
//    $post->save();
    // c2
//    $post = Post::query()->create([
//        'title'=> "bai viet số 3",
//        'content' => "ND viet số 3",
//        'name' =>"ND viet số 3"
//    ]);
    // sửa
    // C1
//    $post = Post::query()->find(2);
//    $post->title = "bài viết số 21";
//    $post->content = "Nội dung bài viết số 2";
//    $post->save();
    // c2
//    $post = Post::query()->find(2)
//        ->update([
//            'title'=> "bai viet số 12",
//            'content' => "ND viet số 3",
//        ]);
    // xóa
    // cứng
    $post = Post::query()->find(2)->delete();
    dd($data);
//    return view('welcome');
});
Route::get('/products', [ProductController::class, 'index'])
    ->name('product.index');
