<?php

use Illuminate\Support\Facades\Route;

use App\Models\Service;
use App\Models\Armada;
use App\Models\AnggotaTim;
use App\Models\Pengiriman;
use App\Models\Galeri;

Route::get('/', function () {
    $services = Service::where('status', 'Aktif')->get();
    $teamMembers = AnggotaTim::where('status', 'Aktif')->get();
    $galeris = Galeri::where('status', 'Aktif')->orderBy('urutan')->get();
    
    // Dynamic Stats
    $armadaCount = Armada::count();
    $pengirimanSelesai = Pengiriman::where('status', 'Selesai')->count();
    $totalPengiriman = Pengiriman::count();
    
    $successRate = $totalPengiriman > 0 ? round(($pengirimanSelesai / $totalPengiriman) * 100) : 99;

    return view('welcome', compact('services', 'teamMembers', 'galeris', 'armadaCount', 'successRate'));
});


