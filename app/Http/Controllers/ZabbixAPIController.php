<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\ServerMetric; 
use App\Models\Server;
use Illuminate\Support\Facades\Auth;

class ZabbixAPIController extends Controller
{
    public function syncServerFromZabbix(){
        $fastAPIUrl="http://192.168.200.136:8000/zabbix/hostServers";
        try{
            $response=Http::timeout(10)->get($fastAPIUrl);
            if($response->successful()){
                $hostServers=$response->json();
                $count =0;

                foreach($hostServers as $serverData){
                    $hostid=$serverData['hostid'] ?? null;
                    if(!$hostid) continue;
                    $hostname=$serverData['hostname'] ?? null;
                    $ip=$serverData['ip'] ?? null;
                    $status=$serverData['status'] ?? null;
                    $os=$serverData['os'] ?? null;
                     $updated=Server::where('hostid',$hostid)->update([
                             'hostname' => $hostname,
                             'ip_address' => $ip,
                             'status' => $status,
                             'os' => $os,
                    ]);
                if($updated){$count++;}
                }
                return response()->json([
                    'success' => true,
                    'message' => "Đã đồng bộ thành công $count server từ Zabbix."
                ]);
            }else{
                return response()->json([
                    'success' => false,
                    'message' => "Không thể kết nối đến FastAPI Zabbix."
                ], $response->status());
            }
        }catch(\Exception $e){
              return response()->json([
                'success' => false,
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function synServerMetricFromZabbix(){
        $fastAPIUrl="http://192.168.200.136:8000/zabbix/getServerMetric";
        try{
            $response=Http::timeout(10)->get($fastAPIUrl);
            if($response->successful()){
                $serverMetric=$response->json();

                foreach($serverMetric as $serverMetricData){
                    $hostid=$serverMetricData['hostid'] ?? null;
                    if(!$hostid){ continue;}
                    $hostname=$serverMetricData['hostname'] ?? null;
                    $cpu_user=$serverMetricData['cpu_user'] ?? null;
                    $ram_total=$serverMetricData['ram_total'] ?? null;
                    $ram_used=$serverMetricData['ram_used'] ?? null;
                    $ram_free=$serverMetricData['ram_free'] ?? null;
                    $hdd_total=$serverMetricData['hdd_total'] ?? null;
                    $hdd_used=$serverMetricData['hdd_used'] ?? null;
                    $hdd_free=$serverMetricData['hdd_free'] ?? null;
                    $uptime=$serverMetricData['uptime'] ?? null;

                    $updated = ServerMetric::updateOrCreate(
                        ['hostid' => $hostid],
                        [
                            'hostname'   => $hostname,
                            'cpu_user'   => $cpu_user,
                            'ram_total'  => $ram_total,
                            'ram_used'   => $ram_used,
                            'ram_free'   => $ram_free,
                            'disk_total' => $hdd_total,
                            'disk_used'  => $hdd_used,
                            'disk_free'  => $hdd_free,
                            'uptime'     => $uptime,
                        ]
                    );
                }
            }

        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
            ], 500);
        }
    }
}