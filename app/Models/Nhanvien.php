<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhanvien extends Model
{
    use HasFactory;
    protected $table="nhanvien";
    protected $fillable = [
        'ma_nv',
        'hinh_anh',
        'ten_nv',
        
        'gioi_tinh',
        'ngay_sinh',
        'noi_sinh',
        'trang_thai',
        'hon_nhan_id',
        'so_cmnd',
        'noi_cap_cmnd',
        'ngay_cap_cmnd',
        'nguyen_quan',
        'quoc_tich_id',
        'ton_giao_id',
        'dan_toc_id',
        'ho_khau',
        'loai_nv_id',
        'trinh_do_id',
        'chuyen_mon_id',
        'bang_cap_id',
        'phong_ban_id',
        'chuc_vu_id',
        'trang_thai',
        'nguoi_tao_id',
        'ngay_tao',
        'nguoi_sua_id',
        'ngay_sua',
       
    ];
}
