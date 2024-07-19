<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // điểu chỉnh kết đến bảng
//    protected $table = "ten bang muon ket noi";
//    // khai bao lai tên khóa chính
//    protected $primaryKey = "Ten khoan chinh khac";
//
//    // khai bao kieuduju lieu cho khoa chinh moi
//    protected $keyType = "kieu du lieu";
//    // tat tăng tư dong cho kho chinh
//    public $incrementing = false;
//    // diều chỉnh ket noi db
//    protected $connection = "ten ket noi";
    protected $fillable =[
        'title',
        'content'
    ];
}
