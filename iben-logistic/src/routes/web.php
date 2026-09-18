<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Armada;
use App\Models\AnggotaTim;
use App\Models\Pengiriman;
use App\Models\Galeri;

Route::get('/', function () {
    $services = Service::where('status', 'Aktif')->get();
    $teamMembers = AnggotaTim::where('status', 'Aktif')->get();
    $galeris = Galeri::where('status', 'Aktif')->orderBy('urutan')->get();
    $galeriCategories = Galeri::where('status', 'Aktif')->pluck('kategori')->unique()->values();
    
    // Dynamic Armada
    $armadas = Armada::orderBy('id')->take(9)->get();
    $armadaTypes = Armada::pluck('tipe')->unique()->values();
    $armadaCount = Armada::count();
    
    // Dynamic Pengiriman & Stats
    $totalPengiriman = Pengiriman::count();
    $pengirimanSelesai = Pengiriman::where('status', 'Selesai')->count();
    $successRate = $totalPengiriman > 0 ? round(($pengirimanSelesai / $totalPengiriman) * 100) : 99;
    $recentShipments = Pengiriman::latest('id')->take(4)->get();

    return view('welcome', compact(
        'services',
        'teamMembers',
        'galeris',
        'galeriCategories',
        'armadas',
        'armadaTypes',
        'armadaCount',
        'totalPengiriman',
        'successRate',
        'recentShipments'
    ));
});

Route::get('/lacak-resi', function (Request $request) {
    $keyword = trim((string) $request->input('resi'));

    if (empty($keyword)) {
        return response()->json([
            'success' => false,
            'message' => 'Silakan masukkan nomor resi atau nama pelanggan.',
        ]);
    }

    $id = null;
    if (preg_match('/(?:IBN-?)?0*([0-9]+)/i', $keyword, $matches)) {
        $id = (int) $matches[1];
    }

    $shipment = Pengiriman::query()
        ->when($id, fn($query) => $query->where('id', $id))
        ->orWhere('pelanggan', 'LIKE', "%{$keyword}%")
        ->orWhere('tujuan', 'LIKE', "%{$keyword}%")
        ->first();

    if (!$shipment) {
        return response()->json([
            'success' => false,
            'message' => 'Data pengiriman dengan nomor/kata kunci "' . htmlspecialchars($keyword) . '" tidak ditemukan.',
        ]);
    }

    return response()->json([
        'success' => true,
        'data' => [
            'resi' => 'IBN-' . str_pad($shipment->id, 4, '0', STR_PAD_LEFT),
            'pelanggan' => $shipment->pelanggan,
            'tujuan' => $shipment->tujuan,
            'layanan' => $shipment->layanan,
            'status' => $shipment->status,
            'tanggal' => $shipment->tanggal ? \Carbon\Carbon::parse($shipment->tanggal)->format('d M Y') : '-',
        ],
    ]);
});
