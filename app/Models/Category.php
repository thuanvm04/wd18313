<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'id',
        'name',
        'status',
        'created_at',
        'updated_at'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function loadAllCate()
    {
        return $this->all();
    }

    public function loadAllCateWithBuilder()
    {
        return DB::table($this->table)
            ->select('id', 'name', 'status', 'created_at', 'updated_at')
            ->get();
    }
}
