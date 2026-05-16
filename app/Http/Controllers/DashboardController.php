<?php

namespace App\Http\Controllers;

use App\Models\Infokus;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $totalInfokus = Infokus::count();

        $totalDipinjam = Peminjaman::where('status', 'dipinjam')->count();

        return view('dashboard', compact(
            'totalInfokus',
            'totalDipinjam'
        ));
    }
}