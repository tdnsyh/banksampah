<?php

namespace App\Http\Controllers\Dashboard\Nasabah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NasabahDashboardController extends Controller
{
    public function index()
    {

        return view('dashboard.nasabah.index');
    }
}
