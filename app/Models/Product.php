<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'products.id',
        'products.name',
        'products.price',
        'products.quantity',
        'products.image',
        'products.category_id',
        'products.status',
        'products.created_at',
        'products.updated_at'
    ];
    public $timestamps = false;
    public function loadAllCategory(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function loadDataWithPager(){
        // Chưa có tìm kiếm
        // Có truy vân kèm phân trang
        // ORM
//        $query = Product::query()
//                ->with('loadAllCategory')
//                ->latest('id')
//                ->paginate(10);
        // DB
        // Join
//        $this->fillable[] = 'categories.name as catename';
//        $query = DB::table($this->table)
//            ->select($this->fillable)
//            ->join('categories', 'products.category_id', '=', 'categories.id')
//            ->orderByDesc('id')
//            ->paginate(10);
        // Truy vân + logic
        $query = DB::table($this->table)
            ->select($this->fillable)
            ->orderByDesc('id')
            ->paginate(10);
        return $query;
    }

}
