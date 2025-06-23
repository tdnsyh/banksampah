<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPenukaranController extends Controller
{
    public function penukaranIndex()
    {
        $title = 'Penukaran';

        return view('dashboard.admin.penukaran.index', compact('title'));
    }

    public function penukaranHistori()
    {
        $title = 'Riwayat Penukaran';

        return view('dashboard.admin.penukaran.history', compact('title'));
    }
}
