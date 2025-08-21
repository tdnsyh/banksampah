<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->get();
        return view('web.index', compact('artikels'));
    }

    public function show()
    {
        return view('web.show');
    }
}
