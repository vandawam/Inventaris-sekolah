<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPerbaikan;
use Illuminate\Http\Request;

class TeknisiController extends Controller
{
    public function index()
    {
        $title = 'Teknisi';
        $data = RiwayatPerbaikan::where('status', 'pending')->get();
        return view('teknisi.index', compact('title', 'data'));
    }
}
