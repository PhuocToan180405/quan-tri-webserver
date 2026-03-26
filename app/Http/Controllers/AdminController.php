<?php

namespace App\Http\Controllers;

use App\Models\Server;
use App\Models\ServerMetric;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Trang Dashboard Admin.
     */
    public function dashboard()
    {
        $servers = Server::all();
        return view('admin.dashboard', compact('servers'));
    }

    /**
     * API: Lấy chỉ số giám sát của server theo hostid.
     * Trả về JSON cho JS polling.
     */
    public function getMetrics($hostid)
    {
        $metric = ServerMetric::where('hostid', $hostid)->first();

        if (!$metric) {
            return response()->json([
                'load'         => 0,
                'ram_used'     => 0,
                'ram_total'    => 0,
                'ram_percent'  => 0,
                'disk_used'    => 0,
                'disk_total'   => 0,
                'disk_percent' => 0,
                'uptime'       => '—',
            ]);
        }

        // CPU Load (from cpu_user, round 1 decimal)
        $load = round((float) $metric->cpu_user, 1);

        // RAM: byte → GB (round 1 decimal)
        $ramUsed  = round((float) $metric->ram_used / pow(1024, 3), 1);
        $ramTotal = round((float) $metric->ram_total / pow(1024, 3), 1);
        $ramPct   = $ramTotal > 0 ? round($ramUsed / $ramTotal * 100, 1) : 0;

        // Disk: byte → GB (round 1 decimal)
        $diskUsed  = round((float) $metric->disk_used / pow(1024, 3), 1);
        $diskTotal = round((float) $metric->disk_total / pow(1024, 3), 1);
        $diskPct   = $diskTotal > 0 ? round($diskUsed / $diskTotal * 100, 1) : 0;

        // Uptime: seconds → "Xd Yh Zm Ws"
        $seconds = (int) $metric->uptime;
        $days    = floor($seconds / 86400);
        $hours   = floor(($seconds % 86400) / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        $secs    = $seconds % 60;
        $uptimeStr = "{$days}d {$hours}h {$minutes}m {$secs}s";

        return response()->json([
            'load'         => $load,
            'ram_used'     => $ramUsed,
            'ram_total'    => $ramTotal,
            'ram_percent'  => $ramPct,
            'disk_used'    => $diskUsed,
            'disk_total'   => $diskTotal,
            'disk_percent' => $diskPct,
            'uptime'       => $uptimeStr,
        ]);
    }
}
