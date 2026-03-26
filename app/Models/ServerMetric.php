<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerMetric extends Model
{
    protected $table = 'server_metrics';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'hostid',
        'cpu_user',
        'ram_used',
        'disk_free',
        'uptime',
        'ram_total',
        'ram_free',
        'disk_total',
        'disk_used',
        'hostname',
    ];
}
