<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Trang Dashboard Client.
     */
    public function dashboard()
    {
        return view('client.dashboard');
    }
}
