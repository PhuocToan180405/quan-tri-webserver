<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table = 'domains';
    protected $primaryKey = 'id';
    public $timestamps = false; // Tắt timestamps mặc định nếu chỉ cần gán created_at (tuỳ chọn, nhưng tôi sẽ giữ để an toàn hoặc thêm `created_at` vào fillable)
    
    protected $fillable = [
        'server_id',
        'domain_name',
        'status',
        'created_at',
        'IP_Address',
    ];
}
