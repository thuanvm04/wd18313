<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'pr.id',
        'pr.name',
        'pr.price',
        'pr.quantity',
        'pr.image',
        'pr.category_id',
        'pr.status',
        'pr.created_at',
        'pr.updated_at'
    ];
    public $timestamps = false;

}
