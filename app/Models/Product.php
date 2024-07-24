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
        'name',
        'price',
        'quantity',
        'image',
        'category_id',
        'status',
    ];
    public $timestamps = true;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function loadDataWithPager(){
        return $this->with('category')
                    ->latest()
                    ->paginate(10);
    }

    public static function createProduct($data)
    {
        return self::create($data);
    }
}