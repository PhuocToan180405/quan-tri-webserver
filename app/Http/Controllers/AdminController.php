<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Trang Dashboard Admin.
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
