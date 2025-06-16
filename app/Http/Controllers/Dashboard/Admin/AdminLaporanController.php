<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLaporanController extends Controller
{
    public function laporanIndex()
    {
        $title = 'Laporan';

        return view('dashboard.admin.laporan.index', compact('title'));
    }
}
