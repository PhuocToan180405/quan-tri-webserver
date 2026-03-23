<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Allowed IPs
    |--------------------------------------------------------------------------
    |
    | Danh sách các địa chỉ IP được phép truy cập vào khu vực quản trị (Admin).
    | Cấu hình trong file .env với key ADMIN_ALLOWED_IPS, phân cách bằng dấu phẩy.
    | Ví dụ: ADMIN_ALLOWED_IPS="127.0.0.1,::1,192.168.1.100"
    |
    */

    'allowed_ips' => array_filter(
        array_map('trim', explode(',', env('ADMIN_ALLOWED_IPS', '127.0.0.1,::1')))
    ),

];
