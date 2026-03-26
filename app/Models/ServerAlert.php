<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerAlert extends Model
{
    protected $table = 'server_alerts';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'hostid',
        'time',
        'status',
        'severity',
        'host',
        'problem',
        'eventid',
    ];
}
