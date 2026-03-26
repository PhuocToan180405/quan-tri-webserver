<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $table = 'servers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'hostid',
        'username',
        'hostname',
        'ip_address',
        'user_id',
        'os',
        'status',
        'ssh_port',
    ];
}
