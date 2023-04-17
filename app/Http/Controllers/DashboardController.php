<?php

namespace App\Http\Controllers;

use App\Models\AdminKontak;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index', [
            'title' => 'Dashboard Admin',
            'pesan' => AdminKontak::orderBy('created_at', 'DESC')->limit(10)->get()
        ]);
    }
}
