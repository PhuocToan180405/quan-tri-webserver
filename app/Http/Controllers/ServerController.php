<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Server; 
use Illuminate\Support\Facades\Auth;

class ServerController extends Controller
{
    /**
     * Hàm gọi API từ FastAPI và đồng bộ vào bảng servers
     */
    public function syncServersFromZabbix()
    {
        // URL tới FastAPI của bạn (thay đổi port/IP nếu cần thiết, ví dụ http://127.0.0.1:8000)
        $fastApiUrl = 'http://127.0.0.1:8000/zabbix/hostServers';

        try {
            // Gọi GET request tới FastAPI
            $response = Http::timeout(10)->get($fastApiUrl);

            // Kiểm tra nếu request thành công (Status 200)
            if ($response->successful()) {
                $hostServers = $response->json();

                // Lấy ID của user đang đăng nhập để gán vào khóa ngoại user_id
                // Giả sử có tính năng login, nếu không bạn có thể hardcode hoặc truyền vào
                $userId = Auth::id() ?? 1; // Mặc định là 1 nếu chưa đăng nhập

                $count = 0;

                foreach ($hostServers as $serverData) {
                    // Trích xuất dữ liệu từ JSON của FastAPI
                    $hostid = $serverData['hostid'] ?? null;
                    if (!$hostid) continue;

                    $hostname = $serverData['hostname'] ?? null;
                    $ip = $serverData['ip'] ?? null;
                    $status = $serverData['status'] ?? null;
                    $os = $serverData['os'] ?? null;

                    // Chỉ cập nhật những dòng (server) đã tồn tại thông qua hostid
                    // Nếu không tồn tại trong database, vòng lặp tự bỏ qua
                    $updated = Server::where('hostid', $hostid)->update([
                        'hostname' => $hostname,
                        'ip_address' => $ip,
                        'status' => $status,
                        'os' => $os,
                        // Có thể thêm user_id => $userId nếu cần, hoặc để nguyên nếu giữ user cũ
                    ]);

                    if ($updated) {
                        $count++;
                    }
                }

                return response()->json([
                    'success' => true,
                    'message' => "Đã đồng bộ thành công $count server từ Zabbix."
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Không thể kết nối đến FastAPI Zabbix."
                ], $response->status());
            }

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
            ], 500);
        }
    }
}
