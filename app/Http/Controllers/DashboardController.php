<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'guru') {
            // Data Dummy grafik progress hafalan keseluruhan untuk dashboard Guru
            $chartData = [
                'labels' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
                'data' => [45, 60, 75, 50, 85, 95] // Jumlah total setoran ayat seluruh santri
            ];
            return view('dashboard.guru', compact('chartData'));
        } else {
            // Data Dummy grafik progress hafalan pribadi untuk dashboard Santri
            $chartData = [
                'labels' => ['Surah Al-Fatihah', 'Surah An-Nas', 'Surah Al-Falaq', 'Surah Al-Ikhlas', 'Surah Al-Masad'],
                'data' => [7, 6, 5, 4, 5] // Jumlah ayat yang berhasil dihafal per surah
            ];
            return view('dashboard.santri', compact('chartData'));
        }
    }
}