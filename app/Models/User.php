<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Tên bảng trong database (số ít, viết thường).
     */
    protected $table = 'user';

    /**
     * Bảng không có cột created_at / updated_at.
     */
    public $timestamps = false;

    /**
     * Không sử dụng remember_token.
     */
    protected $rememberTokenName = null;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'ho',
        'ten',
        'sdt',
        'ma_quyen',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'ma_quyen' => 'integer',
        ];
    }

    /**
     * Kiểm tra user có phải Admin không (ma_quyen = 1).
     */
    public function isAdmin(): bool
    {
        return $this->ma_quyen === 1;
    }

    /**
     * Kiểm tra user có phải Client không (ma_quyen = 2).
     */
    public function isClient(): bool
    {
        return $this->ma_quyen === 2;
    }

    /**
     * Lấy họ tên đầy đủ.
     */
    public function getHoTenAttribute(): string
    {
        return trim($this->ho . ' ' . $this->ten);
    }
}
