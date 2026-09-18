<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PT Iben Logistic Nusantara - Solusi Logistik & Kargo Terpercaya ke Seluruh Indonesia dengan Pelacakan Real-time.">
    <title>Iben Logistic &mdash; Solusi Kargo & Logistik Terpercaya</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        html, body { height: 100%; }
        * { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-display { font-family: 'Instrument Sans', sans-serif; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #1e3a8a; border-radius: 3px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        .aspect-card {
            aspect-ratio: 16 / 10;
            width: 100%;
            object-fit: cover;
            object-position: center;
        }
    </style>
</head>
<body class="min-h-full bg-slate-50 text-slate-900 selection:bg-blue-900 selection:text-white">

    <!-- ══════════════════════════════════════════════════════════
         NAVIGASI HEADER
    ══════════════════════════════════════════════════════════ -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-18 flex items-center justify-between gap-4">
            <!-- Brand Logo -->
            <a href="#home" class="flex items-center gap-2.5 group">
                <div class="w-10 h-10 rounded-xl bg-blue-900 flex items-center justify-center text-white shadow-md group-hover:bg-blue-800 transition-colors">
                    <i data-lucide="truck" class="w-5 h-5"></i>
                </div>
                <div>
                    <span class="font-display text-xl font-bold text-blue-950 tracking-tight block leading-none">Iben Logistic</span>
                    <span class="text-[10px] uppercase font-semibold text-blue-600 tracking-wider">Logistics & Supply Chain</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <nav class="hidden lg:flex items-center gap-8">
                <a href="#home" class="text-sm font-medium text-slate-700 hover:text-blue-900 transition-colors">Beranda</a>
                <a href="#tracking" class="text-sm font-medium text-slate-700 hover:text-blue-900 transition-colors">Lacak Resi</a>
                <a href="#about" class="text-sm font-medium text-slate-700 hover:text-blue-900 transition-colors">Tentang</a>
                <a href="#services" class="text-sm font-medium text-slate-700 hover:text-blue-900 transition-colors">Layanan</a>
                <a href="#armada" class="text-sm font-medium text-slate-700 hover:text-blue-900 transition-colors">Armada</a>
                <a href="#gallery" class="text-sm font-medium text-slate-700 hover:text-blue-900 transition-colors">Galeri</a>
                <a href="#team" class="text-sm font-medium text-slate-700 hover:text-blue-900 transition-colors">Tim</a>
                <a href="#contact" class="text-sm font-medium text-slate-700 hover:text-blue-900 transition-colors">Kontak</a>
            </nav>

            <!-- Quick CTA -->
            <div class="hidden sm:flex items-center gap-3">
                <a href="#tracking" class="inline-flex items-center gap-2 px-4 py-2 text-xs font-semibold rounded-lg bg-blue-50 text-blue-900 hover:bg-blue-100 transition-colors border border-blue-200">
                    <i data-lucide="search" class="w-3.5 h-3.5 text-blue-700"></i>
                    <span>Cek Resi</span>
                </a>
                <a href="#contact" class="inline-flex items-center gap-2 px-4 py-2 text-xs font-semibold rounded-lg bg-blue-900 text-white hover:bg-blue-800 shadow-xs transition-colors">
                    <i data-lucide="phone-call" class="w-3.5 h-3.5"></i>
                    <span>Hubungi Kami</span>
                </a>
            </div>

            <!-- Mobile Hamburger Button -->
            <button id="mobile-menu-btn" type="button" class="lg:hidden p-2 text-slate-600 hover:text-blue-900 rounded-lg hover:bg-slate-100 transition" aria-label="Buka Menu">
                <i data-lucide="menu" id="menu-icon-open" class="w-6 h-6"></i>
                <i data-lucide="x" id="menu-icon-close" class="w-6 h-6 hidden"></i>
            </button>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden lg:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 space-y-2 shadow-lg">
            <a href="#home" class="mobile-nav-link block px-3 py-2 text-base font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-900 rounded-md">Beranda</a>
            <a href="#tracking" class="mobile-nav-link block px-3 py-2 text-base font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-900 rounded-md">Lacak Resi</a>
            <a href="#about" class="mobile-nav-link block px-3 py-2 text-base font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-900 rounded-md">Tentang Kami</a>
            <a href="#services" class="mobile-nav-link block px-3 py-2 text-base font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-900 rounded-md">Layanan</a>
            <a href="#armada" class="mobile-nav-link block px-3 py-2 text-base font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-900 rounded-md">Armada</a>
            <a href="#gallery" class="mobile-nav-link block px-3 py-2 text-base font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-900 rounded-md">Galeri & Fasilitas</a>
            <a href="#team" class="mobile-nav-link block px-3 py-2 text-base font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-900 rounded-md">Tim Pemimpin</a>
            <a href="#contact" class="mobile-nav-link block px-3 py-2 text-base font-medium text-slate-700 hover:bg-blue-50 hover:text-blue-900 rounded-md">Kontak</a>
        </div>
    </header>

    <!-- ══════════════════════════════════════════════════════════
         HERO SECTION
    ══════════════════════════════════════════════════════════ -->
    <section id="home" class="relative bg-gradient-to-br from-blue-950 via-blue-900 to-indigo-950 text-white pt-20 pb-28 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <!-- Background subtle shapes -->
        <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-blue-600/20 blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-indigo-500/15 blur-3xl pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="grid lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-800/80 border border-blue-700 text-blue-200 text-xs font-semibold tracking-wide">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>PT IBEN LOGISTIC NUSANTARA &bull; EKSPEDISI NASIONAL</span>
                    </div>

                    <h1 class="font-display text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-white leading-tight">
                        Solusi Logistik & Kargo Cepat, Aman, & Terpercaya.
                    </h1>

                    <p class="text-blue-100/90 text-base sm:text-lg max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        Menghubungkan rantai pasok bisnis Anda dari hulu ke hilir dengan dukungan puluhan unit armada modern, fasilitas berstandar tinggi, dan sistem pelacakan digital real-time 24 jam.
                    </p>

                    <div class="pt-2 flex flex-wrap items-center justify-center lg:justify-start gap-4">
                        <a href="#tracking" class="inline-flex items-center gap-2.5 px-6 py-3.5 bg-white text-blue-950 font-semibold rounded-xl hover:bg-blue-50 shadow-lg shadow-blue-950/30 transition text-sm">
                            <i data-lucide="package-search" class="w-4 h-4 text-blue-900"></i>
                            <span>Lacak Pengiriman Sekarang</span>
                        </a>
                        <a href="#armada" class="inline-flex items-center gap-2.5 px-6 py-3.5 bg-blue-800/60 hover:bg-blue-800 text-white font-semibold rounded-xl border border-blue-700/80 transition text-sm">
                            <i data-lucide="shield-check" class="w-4 h-4 text-blue-300"></i>
                            <span>Jelajahi Armada Kami</span>
                        </a>
                    </div>
                </div>

                <!-- Hero Illustration / Graphic -->
                <div class="lg:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-md bg-white/10 backdrop-blur-md rounded-2xl border border-white/15 p-6 shadow-2xl text-left">
                        <div class="flex items-center justify-between border-b border-white/15 pb-4 mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-xl bg-blue-500/30 border border-blue-400/40 flex items-center justify-center">
                                    <i data-lucide="radar" class="w-5 h-5 text-blue-200"></i>
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold text-white">Live Monitoring Hub</h4>
                                    <p class="text-xs text-blue-200">Operasional Logistik Aktif</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-semibold bg-emerald-500/20 text-emerald-300 border border-emerald-500/30">
                                Realtime
                            </span>
                        </div>

                        <div class="space-y-3">
                            <div class="p-3 rounded-xl bg-blue-950/50 border border-white/10 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <i data-lucide="truck" class="w-4 h-4 text-blue-300"></i>
                                    <div>
                                        <p class="text-xs font-semibold text-white">Armada Jalan Hari Ini</p>
                                        <p class="text-[11px] text-blue-300">{{ $armadaCount }} Unit Siap & Terjadwal</p>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-emerald-400">Aktif</span>
                            </div>

                            <div class="p-3 rounded-xl bg-blue-950/50 border border-white/10 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <i data-lucide="package-check" class="w-4 h-4 text-blue-300"></i>
                                    <div>
                                        <p class="text-xs font-semibold text-white">Ketepatan Pengiriman</p>
                                        <p class="text-[11px] text-blue-300">Target SLA Terpenuhi</p>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-white">{{ $successRate }}%</span>
                            </div>

                            <div class="p-3 rounded-xl bg-blue-950/50 border border-white/10 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <i data-lucide="map-pin" class="w-4 h-4 text-blue-300"></i>
                                    <div>
                                        <p class="text-xs font-semibold text-white">Jangkauan Wilayah</p>
                                        <p class="text-[11px] text-blue-300">Jawa, Sumatera, Kalimantan, Sulawesi</p>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-blue-300">34 Provinsi</span>
                            </div>
                        </div>

                        <div class="mt-5 pt-4 border-t border-white/10 text-center">
                            <span class="text-xs text-blue-200">ISO 9001:2015 Bersertifikat &bull; Asuransi Kargo Terjamin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════════════════════
         MODUL DINAMIS 1: CEK RESI (PENGIRIMAN TRACKING WIDGET)
    ══════════════════════════════════════════════════════════ -->
    <section id="tracking" class="relative -mt-14 z-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl border border-slate-200/80 p-6 sm:p-8">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-6 mb-6">
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="p-2 rounded-lg bg-blue-100 text-blue-900">
                                <i data-lucide="search" class="w-5 h-5"></i>
                            </span>
                            <h2 class="font-display text-2xl font-bold text-blue-950">Lacak Pengiriman Kargo</h2>
                        </div>
                        <p class="text-slate-500 text-xs sm:text-sm mt-1">
                            Pantau status dan riwayat pergerakan kargo secara real-time dari database pengiriman kami.
                        </p>
                    </div>
                    <div class="flex items-center gap-2 self-start sm:self-auto">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                            {{ $totalPengiriman }} Resi Terdaftar
                        </span>
                    </div>
                </div>

                <!-- Tracking Form -->
                <form id="tracking-form" class="space-y-4">
                    <div class="flex flex-col sm:flex-row gap-3">
                        <div class="relative flex-grow">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <i data-lucide="package" class="w-5 h-5"></i>
                            </div>
                            <input 
                                type="text" 
                                id="resi-input" 
                                name="resi" 
                                placeholder="Masukkan Nomor Resi (cth: IBN-0001) atau Nama Pelanggan..."
                                class="w-full pl-11 pr-4 py-3 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition"
                                required
                            >
                        </div>
                        <button 
                            type="submit" 
                            id="btn-track"
                            class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-blue-900 hover:bg-blue-800 text-white text-sm font-semibold rounded-xl shadow-md transition disabled:opacity-70 cursor-pointer"
                        >
                            <span id="btn-text" class="flex items-center gap-2">
                                <i data-lucide="search" class="w-4 h-4"></i>
                                <span>Lacak Resi</span>
                            </span>
                            <span id="btn-loading" class="hidden items-center gap-2">
                                <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                </svg>
                                <span>Mencari...</span>
                            </span>
                        </button>
                    </div>

                    <!-- Sample Resi Quick Buttons -->
                    <div class="flex flex-wrap items-center gap-2 pt-1 text-xs text-slate-500">
                        <span class="font-medium text-slate-600">Contoh Resi Cepat:</span>
                        @foreach($recentShipments as $rec)
                            @php
                                $code = 'IBN-' . str_pad($rec->id, 4, '0', STR_PAD_LEFT);
                                $badgeColor = $rec->status === 'Selesai' ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-blue-50 text-blue-700 border-blue-200';
                            @endphp
                            <button 
                                type="button" 
                                class="sample-resi-btn inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md border text-xs font-mono font-medium hover:bg-slate-100 transition {{ $badgeColor }}" 
                                data-resi="{{ $code }}"
                            >
                                <span>{{ $code }}</span>
                                <span class="text-[10px] opacity-75">({{ $rec->status }})</span>
                            </button>
                        @endforeach
                    </div>
                </form>

                <!-- Tracking Error Alert -->
                <div id="tracking-error" class="hidden mt-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm flex items-start gap-3">
                    <i data-lucide="alert-circle" class="w-5 h-5 shrink-0 mt-0.5 text-red-600"></i>
                    <div>
                        <h5 class="font-semibold text-red-900">Nomor Resi Tidak Ditemukan</h5>
                        <p id="error-message" class="text-xs text-red-700 mt-0.5">Pastikan nomor resi yang Anda masukkan sudah benar.</p>
                    </div>
                </div>

                <!-- Dynamic Tracking Result Box -->
                <div id="tracking-result" class="hidden mt-6 p-5 sm:p-6 rounded-2xl bg-blue-50/70 border border-blue-100 transition-all duration-300">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-blue-200/60 pb-4 mb-5">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-900 text-white flex items-center justify-center">
                                <i data-lucide="box" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <span class="text-xs text-blue-600 font-semibold uppercase tracking-wider block">Nomor Resi</span>
                                <span id="res-resi" class="font-display font-bold text-xl text-blue-950 font-mono">IBN-0001</span>
                            </div>
                        </div>
                        <div>
                            <span id="res-status-badge" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold shadow-xs">
                                <!-- Dynamic status badge -->
                            </span>
                        </div>
                    </div>

                    <!-- Details Grid -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6 text-sm">
                        <div class="p-3 bg-white rounded-xl border border-blue-100">
                            <span class="text-xs text-slate-500 block">Penerima / Klien</span>
                            <span id="res-pelanggan" class="font-semibold text-slate-800 block mt-0.5">-</span>
                        </div>
                        <div class="p-3 bg-white rounded-xl border border-blue-100">
                            <span class="text-xs text-slate-500 block">Kota Tujuan</span>
                            <span id="res-tujuan" class="font-semibold text-slate-800 block mt-0.5">-</span>
                        </div>
                        <div class="p-3 bg-white rounded-xl border border-blue-100">
                            <span class="text-xs text-slate-500 block">Layanan Ekspedisi</span>
                            <span id="res-layanan" class="font-semibold text-slate-800 block mt-0.5">-</span>
                        </div>
                        <div class="p-3 bg-white rounded-xl border border-blue-100">
                            <span class="text-xs text-slate-500 block">Tanggal Kirim</span>
                            <span id="res-tanggal" class="font-semibold text-slate-800 block mt-0.5">-</span>
                        </div>
                    </div>

                    <!-- 4-Step Visual Progress Bar -->
                    <div>
                        <span class="text-xs font-semibold text-blue-900 uppercase tracking-wider block mb-3">Status Perjalanan Paket</span>
                        <div class="grid grid-cols-4 gap-2 text-center text-xs">
                            <!-- Step 1 -->
                            <div class="step-item flex flex-col items-center">
                                <div id="step-icon-1" class="w-8 h-8 rounded-full bg-blue-900 text-white flex items-center justify-center mb-1.5 shadow-xs">
                                    <i data-lucide="check" class="w-4 h-4"></i>
                                </div>
                                <span class="font-semibold text-slate-800">Diterima</span>
                                <span class="text-[10px] text-slate-500 hidden sm:block">Pesanan Dibuat</span>
                            </div>
                            <!-- Step 2 -->
                            <div class="step-item flex flex-col items-center">
                                <div id="step-icon-2" class="w-8 h-8 rounded-full bg-blue-900 text-white flex items-center justify-center mb-1.5 shadow-xs">
                                    <i data-lucide="package" class="w-4 h-4"></i>
                                </div>
                                <span class="font-semibold text-slate-800">Gudang & Sortir</span>
                                <span class="text-[10px] text-slate-500 hidden sm:block">QC & Pemuatan</span>
                            </div>
                            <!-- Step 3 -->
                            <div class="step-item flex flex-col items-center">
                                <div id="step-icon-3" class="w-8 h-8 rounded-full bg-blue-900 text-white flex items-center justify-center mb-1.5 shadow-xs">
                                    <i data-lucide="truck" class="w-4 h-4"></i>
                                </div>
                                <span class="font-semibold text-slate-800">Dalam Transit</span>
                                <span class="text-[10px] text-slate-500 hidden sm:block">Menuju Tujuan</span>
                            </div>
                            <!-- Step 4 -->
                            <div class="step-item flex flex-col items-center">
                                <div id="step-icon-4" class="w-8 h-8 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center mb-1.5 shadow-xs">
                                    <i data-lucide="map-pin" class="w-4 h-4"></i>
                                </div>
                                <span id="step-text-4" class="font-semibold text-slate-500">Tiba di Tujuan</span>
                                <span class="text-[10px] text-slate-500 hidden sm:block">Selesai & Diterima</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════════════════════
         TENTANG KAMI & KEY STATS
    ══════════════════════════════════════════════════════════ -->
    <section id="about" class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-blue-700 text-xs font-bold uppercase tracking-widest block mb-2">Profil Perusahaan</span>
                <h2 class="font-display text-3xl sm:text-4xl font-bold text-blue-950">
                    Menghubungkan Nusantara Melalui Layanan Logistik Terpadu
                </h2>
                <p class="text-slate-600 text-sm sm:text-base mt-4 leading-relaxed">
                    Didirikan sejak 2014, Iben Logistic berkomitmen menghadirkan layanan kargo berstandar global dengan integritas, transparansi rute, dan dedikasi penuh terhadap ketepatan waktu.
                </p>
            </div>

            <!-- 4 Highlight Cards -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-16">
                <div class="bg-blue-50/60 border border-blue-100 rounded-2xl p-6 text-center hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto rounded-xl bg-blue-900 text-white flex items-center justify-center mb-4">
                        <i data-lucide="award" class="w-6 h-6"></i>
                    </div>
                    <span class="font-display text-3xl sm:text-4xl font-bold text-blue-950 block">10+</span>
                    <span class="text-xs sm:text-sm font-semibold text-blue-800 mt-1 block">Tahun Pengalaman</span>
                    <p class="text-slate-500 text-xs mt-1">Mengelola rantai pasok nasional</p>
                </div>

                <div class="bg-blue-50/60 border border-blue-100 rounded-2xl p-6 text-center hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto rounded-xl bg-blue-900 text-white flex items-center justify-center mb-4">
                        <i data-lucide="truck" class="w-6 h-6"></i>
                    </div>
                    <span class="font-display text-3xl sm:text-4xl font-bold text-blue-950 block">{{ $armadaCount }}+</span>
                    <span class="text-xs sm:text-sm font-semibold text-blue-800 mt-1 block">Unit Armada Aktif</span>
                    <p class="text-slate-500 text-xs mt-1">Truk berat, box, & van laik jalan</p>
                </div>

                <div class="bg-blue-50/60 border border-blue-100 rounded-2xl p-6 text-center hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto rounded-xl bg-blue-900 text-white flex items-center justify-center mb-4">
                        <i data-lucide="package-check" class="w-6 h-6"></i>
                    </div>
                    <span class="font-display text-3xl sm:text-4xl font-bold text-blue-950 block">{{ $totalPengiriman }}+</span>
                    <span class="text-xs sm:text-sm font-semibold text-blue-800 mt-1 block">Total Pengiriman</span>
                    <p class="text-slate-500 text-xs mt-1">Mitra korporasi & UMKM</p>
                </div>

                <div class="bg-blue-50/60 border border-blue-100 rounded-2xl p-6 text-center hover:shadow-md transition">
                    <div class="w-12 h-12 mx-auto rounded-xl bg-blue-900 text-white flex items-center justify-center mb-4">
                        <i data-lucide="trending-up" class="w-6 h-6"></i>
                    </div>
                    <span class="font-display text-3xl sm:text-4xl font-bold text-blue-950 block">{{ $successRate }}%</span>
                    <span class="text-xs sm:text-sm font-semibold text-blue-800 mt-1 block">Ketepatan Waktu</span>
                    <p class="text-slate-500 text-xs mt-1">SLA pengiriman tercapai</p>
                </div>
            </div>

            <!-- Value Pillars -->
            <div class="grid md:grid-cols-3 gap-8 pt-4">
                <div class="border border-slate-200 rounded-2xl p-6 bg-slate-50/50 space-y-3">
                    <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-900 flex items-center justify-center font-bold">
                        <i data-lucide="shield-alert" class="w-5 h-5"></i>
                    </div>
                    <h3 class="font-display text-lg font-bold text-blue-950">Asuransi & Keamanan Penuh</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Setiap kargo dilindungi oleh polis asuransi terpercaya serta prosedur standar pengamanan kargo (SOP) yang ketat di setiap titik bongkar muat.
                    </p>
                </div>

                <div class="border border-slate-200 rounded-2xl p-6 bg-slate-50/50 space-y-3">
                    <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-900 flex items-center justify-center font-bold">
                        <i data-lucide="cpu" class="w-5 h-5"></i>
                    </div>
                    <h3 class="font-display text-lg font-bold text-blue-950">Sistem Digital Terintegrasi</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Database terpusat dengan update status real-time memudahkan Anda memeriksa lokasi dan riwayat perjalanan barang tanpa repot menghubungi CS.
                    </p>
                </div>

                <div class="border border-slate-200 rounded-2xl p-6 bg-slate-50/50 space-y-3">
                    <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-900 flex items-center justify-center font-bold">
                        <i data-lucide="users-round" class="w-5 h-5"></i>
                    </div>
                    <h3 class="font-display text-lg font-bold text-blue-950">Dukungan Pengemudi Ahli</h3>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Seluruh pengemudi armada telah tersertifikasi, berpengalaman ribuan kilometer perjalanan darat, dan dilengkapi GPS pemantau kecepatan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════════════════════
         MODUL DINAMIS 2: LAYANAN KAMI (DATABASE SERVICES)
    ══════════════════════════════════════════════════════════ -->
    <section id="services" class="py-24 px-4 sm:px-6 lg:px-8 bg-slate-100/70 border-t border-slate-200/70">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-blue-700 text-xs font-bold uppercase tracking-widest block mb-2">Layanan Unggulan</span>
                <h2 class="font-display text-3xl sm:text-4xl font-bold text-blue-950">Solusi Logistik Sesuai Kebutuhan</h2>
                <p class="text-slate-600 text-sm mt-3">
                    Kami menyediakan berbagai pilihan moda transportasi dan manajemen pergudangan yang fleksibel dan efisien untuk bisnis Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($services as $service)
                    <div class="group bg-white rounded-2xl p-8 border border-slate-200/80 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col justify-between hover:-translate-y-1">
                        <div>
                            <div class="w-14 h-14 rounded-xl bg-blue-900 text-white flex items-center justify-center mb-6 group-hover:bg-blue-800 transition-colors shadow-sm">
                                <i data-lucide="{{ Str::lower($service->ikon) }}" class="w-7 h-7"></i>
                            </div>
                            <h3 class="font-display text-xl font-bold text-blue-950 mb-3 group-hover:text-blue-700 transition-colors">
                                {{ $service->nama }}
                            </h3>
                            <p class="text-slate-600 text-sm leading-relaxed">
                                {{ $service->deskripsi }}
                            </p>
                        </div>

                        <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between">
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-600">
                                <i data-lucide="check-circle" class="w-4 h-4"></i>
                                <span>Layanan Aktif</span>
                            </span>
                            <a href="#contact" class="inline-flex items-center gap-1 text-xs font-semibold text-blue-900 group-hover:text-blue-700 hover:underline">
                                <span>Konsultasi</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-slate-500 text-sm">
                        Belum ada layanan logistik yang terdaftar.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════════════════════
         MODUL DINAMIS 3: ARMADA KAMI (DATABASE ARMADA)
    ══════════════════════════════════════════════════════════ -->
    <section id="armada" class="py-24 px-4 sm:px-6 lg:px-8 bg-white border-t border-slate-200/70">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <span class="text-blue-700 text-xs font-bold uppercase tracking-widest block mb-2">Kekuatan Distribusi</span>
                    <h2 class="font-display text-3xl sm:text-4xl font-bold text-blue-950">Armada Tangguh & Siap Operasi</h2>
                    <p class="text-slate-600 text-sm mt-2 max-w-xl">
                        Didukung {{ $armadaCount }}+ unit kendaraan berbagai tipe yang menjalani inspeksi keselamatan berkala dan dilengkapi sistem pelacakan GPS.
                    </p>
                </div>

                <!-- Armada Filter Tabs -->
                <div class="flex flex-wrap items-center gap-2" id="armada-filters">
                    <button 
                        type="button" 
                        class="armada-filter-btn px-4 py-2 rounded-xl text-xs font-semibold transition bg-blue-900 text-white shadow-xs" 
                        data-filter="all"
                    >
                        Semua Armada
                    </button>
                    @foreach($armadaTypes as $type)
                        <button 
                            type="button" 
                            class="armada-filter-btn px-4 py-2 rounded-xl text-xs font-semibold transition bg-slate-100 text-slate-700 hover:bg-slate-200 border border-slate-200" 
                            data-filter="{{ Str::slug($type) }}"
                        >
                            {{ $type }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Armada Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="armada-grid">
                @forelse($armadas as $armada)
                    @php
                        $armadaSlug = Str::slug($armada->tipe);
                        $armadaImg = $armada->foto 
                            ? (Str::startsWith($armada->foto, 'http') ? $armada->foto : asset('storage/' . $armada->foto))
                            : asset('storage/armada/truk-tronton.jpg');
                        
                        $statusClass = match($armada->status) {
                            'Tersedia' => 'bg-emerald-500/90 text-white',
                            'Beroperasi' => 'bg-blue-600/90 text-white',
                            default => 'bg-amber-500/90 text-white',
                        };
                    @endphp
                    <div class="armada-card group bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col" data-type="{{ $armadaSlug }}">
                        <!-- Image Container with guaranteed 16:10 aspect ratio and ZERO cropping squish -->
                        <div class="relative w-full overflow-hidden bg-slate-100" style="aspect-ratio: 16 / 10;">
                            <img 
                                src="{{ $armadaImg }}" 
                                alt="{{ $armada->tipe }} - {{ $armada->nomorKendaraan }}" 
                                class="aspect-card w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
                                loading="lazy"
                            >
                            <!-- Status Badge -->
                            <span class="absolute top-3 right-3 text-xs font-semibold px-3 py-1 rounded-full backdrop-blur-md shadow-xs {{ $statusClass }}">
                                {{ $armada->status }}
                            </span>
                            <!-- Plat Nomor Monospace Badge -->
                            <span class="absolute bottom-3 left-3 bg-slate-950/85 backdrop-blur-md text-white font-mono text-xs font-bold px-3 py-1 rounded-lg shadow-xs border border-white/20">
                                {{ $armada->nomorKendaraan }}
                            </span>
                        </div>

                        <!-- Card Body -->
                        <div class="p-5 flex flex-col flex-grow justify-between space-y-4">
                            <div>
                                <div class="flex items-center justify-between">
                                    <h4 class="font-display font-bold text-lg text-blue-950">{{ $armada->tipe }}</h4>
                                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-md bg-blue-50 text-blue-800 border border-blue-100">
                                        {{ $armada->kapasitas }}
                                    </span>
                                </div>
                                <div class="mt-3 pt-3 border-t border-slate-100 text-xs text-slate-600 space-y-1.5">
                                    <div class="flex items-center justify-between">
                                        <span class="text-slate-500">Pengemudi / Supir:</span>
                                        <span class="font-semibold text-slate-800">{{ $armada->driver ?? 'Tim Iben Logistic' }}</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-slate-500">Fitur Keamanan:</span>
                                        <span class="font-medium text-emerald-600 flex items-center gap-1">
                                            <i data-lucide="check" class="w-3.5 h-3.5"></i> GPS Tracker Aktif
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <a href="#contact" class="w-full py-2 px-3 text-center text-xs font-semibold rounded-xl bg-slate-50 hover:bg-blue-50 text-blue-900 border border-slate-200 hover:border-blue-200 transition">
                                Reservasi Armada Ini
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-slate-500 text-sm">
                        Belum ada armada yang ditampilkan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════════════════════
         MODUL DINAMIS 4: GALERI & FASILITAS (FIXED ASPECT RATIO)
    ══════════════════════════════════════════════════════════ -->
    <section id="gallery" class="py-24 px-4 sm:px-6 lg:px-8 bg-slate-50 border-t border-slate-200/70">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <span class="text-blue-700 text-xs font-bold uppercase tracking-widest block mb-2">Dokumentasi Operasional</span>
                    <h2 class="font-display text-3xl sm:text-4xl font-bold text-blue-950">Galeri Fasilitas & Infrastruktur</h2>
                    <p class="text-slate-600 text-sm mt-2 max-w-xl">
                        Foto dokumentasi nyata armada ekspedisi, terminal kargo udara, pelabuhan, dan fasilitas cold storage modern Iben Logistic.
                    </p>
                </div>

                <!-- Gallery Category Tabs -->
                <div class="flex flex-wrap items-center gap-2" id="gallery-filters">
                    <button 
                        type="button" 
                        class="gallery-filter-btn px-4 py-2 rounded-xl text-xs font-semibold transition bg-blue-900 text-white shadow-xs" 
                        data-filter="all"
                    >
                        Semua Kategori
                    </button>
                    @foreach($galeriCategories as $category)
                        <button 
                            type="button" 
                            class="gallery-filter-btn px-4 py-2 rounded-xl text-xs font-semibold transition bg-white text-slate-700 hover:bg-slate-100 border border-slate-200" 
                            data-filter="{{ Str::slug($category) }}"
                        >
                            {{ $category }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Responsive 3-Column Grid with NO squishing / cropped cutoff -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="gallery-grid">
                @forelse($galeris as $item)
                    @php
                        $catSlug = Str::slug($item->kategori);
                        $photoUrl = Str::startsWith($item->foto, 'http') ? $item->foto : asset('storage/' . $item->foto);
                    @endphp
                    <div 
                        class="gallery-card group bg-white rounded-2xl overflow-hidden border border-slate-200/80 shadow-xs hover:shadow-xl transition-all duration-300 flex flex-col cursor-pointer" 
                        data-category="{{ $catSlug }}"
                        onclick="openLightbox('{{ $photoUrl }}', '{{ addslashes($item->judul) }}', '{{ addslashes($item->kategori) }}', '{{ addslashes($item->keterangan ?? '') }}')"
                    >
                        <!-- Container with guaranteed 16:10 aspect ratio and centered object-cover -->
                        <div class="relative w-full overflow-hidden bg-slate-100" style="aspect-ratio: 16 / 10;">
                            <img 
                                src="{{ $photoUrl }}" 
                                alt="{{ $item->judul }}" 
                                class="aspect-card w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500"
                                loading="lazy"
                            >
                            <!-- Category Badge -->
                            <span class="absolute top-3 right-3 bg-blue-950/85 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full shadow-xs border border-white/20">
                                {{ $item->kategori }}
                            </span>
                            <!-- Hover Overlay with Zoom Icon -->
                            <div class="absolute inset-0 bg-blue-950/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <span class="p-3 rounded-full bg-white/90 text-blue-950 shadow-md">
                                    <i data-lucide="maximize-2" class="w-5 h-5"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Caption -->
                        <div class="p-5 flex flex-col flex-grow justify-between">
                            <div>
                                <h3 class="font-display text-base font-bold text-blue-950 group-hover:text-blue-700 transition-colors leading-snug">
                                    {{ $item->judul }}
                                </h3>
                                @if($item->keterangan)
                                    <p class="text-slate-600 text-xs mt-2 line-clamp-2 leading-relaxed">
                                        {{ $item->keterangan }}
                                    </p>
                                @endif
                            </div>
                            <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                                <span>Klik untuk memperbesar</span>
                                <i data-lucide="external-link" class="w-3.5 h-3.5 text-blue-600"></i>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-slate-500 text-sm">
                        Belum ada foto galeri yang dipublikasikan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════════════════════
         MODUL DINAMIS 5: TIM MANAJEMEN
    ══════════════════════════════════════════════════════════ -->
    <section id="team" class="py-24 px-4 sm:px-6 lg:px-8 bg-white border-t border-slate-200/70">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-blue-700 text-xs font-bold uppercase tracking-widest block mb-2">Struktur Kepemimpinan</span>
                <h2 class="font-display text-3xl sm:text-4xl font-bold text-blue-950">Kenali Tim Profesional Kami</h2>
                <p class="text-slate-600 text-sm mt-3">
                    Dipimpin oleh tenaga ahli berdedikasi tinggi dengan rekam jejak panjang di bidang manajemen logistik dan supply chain nasional.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($teamMembers as $member)
                    @php
                        $memberPhoto = $member->foto 
                            ? (Str::startsWith($member->foto, 'http') ? $member->foto : asset('storage/' . $member->foto))
                            : null;
                    @endphp
                    <div class="bg-slate-50/70 rounded-2xl p-6 border border-slate-200/80 shadow-xs hover:shadow-lg transition flex flex-col items-center text-center">
                        <div class="relative mb-5">
                            @if($memberPhoto)
                                <img 
                                    src="{{ $memberPhoto }}" 
                                    alt="{{ $member->nama }}" 
                                    class="w-24 h-24 rounded-full object-cover object-center shadow-md border-3 border-blue-200"
                                    loading="lazy"
                                >
                            @else
                                <div class="w-24 h-24 rounded-full bg-blue-100 border-3 border-blue-200 flex items-center justify-center text-blue-900 font-display text-2xl font-bold">
                                    {{ collect(explode(' ', $member->nama))->map(fn($n) => substr($n, 0, 1))->take(2)->join('') }}
                                </div>
                            @endif
                            <span class="absolute bottom-0 right-1 w-4 h-4 rounded-full bg-emerald-500 border-2 border-white" title="Aktif"></span>
                        </div>

                        <h3 class="font-display text-base font-bold text-blue-950 leading-snug">{{ $member->nama }}</h3>
                        <p class="text-blue-700 text-xs font-semibold mt-1">{{ $member->jabatan }}</p>

                        @if($member->email)
                            <a href="mailto:{{ $member->email }}" class="inline-flex items-center gap-1.5 text-slate-500 hover:text-blue-900 text-xs mt-3 transition">
                                <i data-lucide="mail" class="w-3.5 h-3.5"></i>
                                <span>{{ $member->email }}</span>
                            </a>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-slate-500 text-sm">
                        Belum ada data anggota tim.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════════════════════
         KONTAK & FORMULIR KONSULTASI
    ══════════════════════════════════════════════════════════ -->
    <section id="contact" class="py-24 px-4 sm:px-6 lg:px-8 bg-slate-100/70 border-t border-slate-200/70">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-blue-700 text-xs font-bold uppercase tracking-widest block mb-2">Hubungi Kami</span>
                <h2 class="font-display text-3xl sm:text-4xl font-bold text-blue-950">Siap Mengirim Kargo Anda?</h2>
                <p class="text-slate-600 text-sm mt-3">
                    Konsultasikan rute, jadwal pengiriman kargo, maupun penawaran kerja sama korporasi dengan tim representatif kami.
                </p>
            </div>

            <div class="grid lg:grid-cols-12 gap-10">
                <!-- Contact Info Cards -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs space-y-5">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-blue-900 text-white flex items-center justify-center shrink-0">
                                <i data-lucide="map-pin" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-900 text-sm">Kantor Pusat Logistik</h4>
                                <p class="text-slate-600 text-xs mt-1 leading-relaxed">
                                    Jl. Logistik Utama No. 12, Kawasan Industri Pulogadung, Jakarta Timur, Indonesia 13220
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-blue-900 text-white flex items-center justify-center shrink-0">
                                <i data-lucide="phone" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-900 text-sm">Telepon Operasional</h4>
                                <p class="text-slate-600 text-xs mt-1">+62 21 8800 4400 / +62 812-9900-8800</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-blue-900 text-white flex items-center justify-center shrink-0">
                                <i data-lucide="mail" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-900 text-sm">Email Korporasi</h4>
                                <p class="text-slate-600 text-xs mt-1">cs@ibenlogistic.co.id / corporate@ibenlogistic.co.id</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-blue-900 text-white flex items-center justify-center shrink-0">
                                <i data-lucide="clock" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-900 text-sm">Jam Operasional Layanan</h4>
                                <p class="text-slate-600 text-xs mt-1">Senin &ndash; Sabtu: 08.00 &ndash; 18.00 WIB (Monitoring 24 Jam)</p>
                            </div>
                        </div>
                    </div>

                    <!-- Map Simulation Card -->
                    <div class="bg-blue-950 rounded-2xl p-6 text-white text-center flex flex-col items-center justify-center gap-3">
                        <i data-lucide="navigation" class="w-8 h-8 text-blue-300"></i>
                        <h4 class="font-display font-bold text-base">Lokasi Strategis Dekat Tol & Pelabuhan</h4>
                        <p class="text-xs text-blue-200">Akses langsung ke Tol Lingkar Luar & Pelabuhan Tanjung Priok.</p>
                    </div>
                </div>

                <!-- Form -->
                <div class="lg:col-span-7">
                    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200 shadow-xs">
                        <h3 class="font-display text-xl font-bold text-blue-950 mb-2">Kirim Pesan atau Permintaan Penawaran</h3>
                        <p class="text-slate-500 text-xs sm:text-sm mb-6">Kami akan merespons pertanyaan Anda dalam waktu maksimal 2 jam kerja.</p>

                        <!-- Feedback notification -->
                        <div id="contact-success" class="hidden mb-5 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs sm:text-sm flex items-center gap-3">
                            <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600 shrink-0"></i>
                            <span>Terima kasih! Pesan dan penawaran Anda telah terkirim. Tim Iben Logistic segera menghubungi Anda.</span>
                        </div>

                        <form id="contact-form" class="space-y-4">
                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Nama Lengkap</label>
                                    <input 
                                        type="text" 
                                        id="contact-nama" 
                                        required 
                                        placeholder="Nama lengkap Anda"
                                        class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition"
                                    >
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Email Bisnis</label>
                                    <input 
                                        type="email" 
                                        id="contact-email" 
                                        required 
                                        placeholder="email@perusahaan.com"
                                        class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition"
                                    >
                                </div>
                            </div>

                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Nomor WhatsApp / Telp</label>
                                    <input 
                                        type="tel" 
                                        id="contact-phone" 
                                        placeholder="08123456789"
                                        class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition"
                                    >
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1.5">Pilihan Layanan</label>
                                    <select 
                                        id="contact-layanan" 
                                        class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition bg-white"
                                    >
                                        <option value="Angkutan Darat">Angkutan Darat (Truk / Box)</option>
                                        <option value="Kargo Udara">Kargo Udara Ekspres</option>
                                        <option value="Pergudangan">Pergudangan & Cold Storage</option>
                                        <option value="Kargo Laut">Kargo Laut & Peti Kemas</option>
                                        <option value="Konsultasi Logistik">Konsultasi Rantai Pasok</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Detail Kebutuhan Pengiriman</label>
                                <textarea 
                                    id="contact-pesan" 
                                    rows="4" 
                                    required 
                                    placeholder="Jelaskan jenis kargo, rute pengiriman (kota asal & tujuan), perkiraan berat/volume, atau pertanyaan Anda..."
                                    class="w-full px-3.5 py-2.5 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-800 focus:border-blue-800 transition resize-none"
                                ></textarea>
                            </div>

                            <button 
                                type="submit" 
                                class="w-full py-3.5 bg-blue-900 hover:bg-blue-800 text-white font-semibold rounded-xl shadow-md transition text-sm flex items-center justify-center gap-2 cursor-pointer"
                            >
                                <i data-lucide="send" class="w-4 h-4"></i>
                                <span>Kirim Permintaan Sekarang</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════════════════════════════════════════════════
         LIGHTBOX MODAL (FOR GALLERY IMAGES)
    ══════════════════════════════════════════════════════════ -->
    <div id="lightbox-modal" class="fixed inset-0 z-50 bg-slate-950/85 backdrop-blur-md hidden items-center justify-center p-4 sm:p-6" onclick="closeLightbox(event)">
        <div class="relative max-w-4xl w-full bg-white rounded-2xl overflow-hidden shadow-2xl border border-slate-700/50" onclick="event.stopPropagation()">
            <!-- Close Button -->
            <button 
                type="button" 
                onclick="closeLightboxDirect()" 
                class="absolute top-4 right-4 z-10 w-9 h-9 rounded-full bg-black/60 hover:bg-black/80 text-white flex items-center justify-center transition"
                aria-label="Tutup Preview"
            >
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>

            <!-- Image View -->
            <div class="relative w-full bg-slate-900 flex items-center justify-center max-h-[70vh] overflow-hidden">
                <img id="lightbox-img" src="" alt="" class="w-full max-h-[70vh] object-contain">
            </div>

            <!-- Meta Details -->
            <div class="p-6 bg-white">
                <div class="flex items-center gap-2 mb-2">
                    <span id="lightbox-cat" class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-900"></span>
                </div>
                <h3 id="lightbox-title" class="font-display text-xl font-bold text-blue-950"></h3>
                <p id="lightbox-desc" class="text-slate-600 text-xs sm:text-sm mt-2 leading-relaxed"></p>
            </div>
        </div>
    </div>

    <!-- ══════════════════════════════════════════════════════════
         FOOTER
    ══════════════════════════════════════════════════════════ -->
    <footer class="bg-blue-950 text-white pt-16 pb-12 px-4 sm:px-6 lg:px-8 border-t border-blue-900">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 mb-12">
            <div class="lg:col-span-5 space-y-4">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-xl bg-blue-600 flex items-center justify-center text-white shadow-sm">
                        <i data-lucide="truck" class="w-5 h-5"></i>
                    </div>
                    <span class="font-display text-2xl font-bold text-white">Iben Logistic</span>
                </div>
                <p class="text-blue-200/80 text-xs sm:text-sm max-w-sm leading-relaxed">
                    Perusahaan penyedia jasa ekspedisi kargo darat, laut, udara, dan manajemen rantai pasok profesional di Indonesia.
                </p>
                <div class="pt-2 text-xs text-blue-300/80">
                    <p>Dikembangkan oleh: <strong>Ibnu Anjang Al-Anwari</strong></p>
                    <p>Pengajar / Pengampu: <strong>Bapak Hendra</strong></p>
                </div>
            </div>

            <div class="lg:col-span-3 space-y-3">
                <h4 class="font-display font-semibold text-sm text-white uppercase tracking-wider">Navigasi Utama</h4>
                <ul class="space-y-2 text-xs text-blue-200/80">
                    <li><a href="#home" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="#tracking" class="hover:text-white transition">Lacak Resi Pengiriman</a></li>
                    <li><a href="#about" class="hover:text-white transition">Tentang Kami</a></li>
                    <li><a href="#services" class="hover:text-white transition">Layanan Logistik</a></li>
                    <li><a href="#armada" class="hover:text-white transition">Armada Kami</a></li>
                    <li><a href="#gallery" class="hover:text-white transition">Galeri Fasilitas</a></li>
                    <li><a href="#team" class="hover:text-white transition">Tim Manajemen</a></li>
                </ul>
            </div>

            <div class="lg:col-span-4 space-y-3">
                <h4 class="font-display font-semibold text-sm text-white uppercase tracking-wider">Kantor Operasional</h4>
                <p class="text-xs text-blue-200/80 leading-relaxed">
                    Jl. Logistik Utama No. 12, Kawasan Industri Pulogadung, Jakarta Timur, Indonesia 13220
                </p>
                <p class="text-xs text-blue-200/80">Telepon: +62 21 8800 4400</p>
                <p class="text-xs text-blue-200/80">Email: cs@ibenlogistic.co.id</p>
                <div class="pt-3">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[11px] font-semibold bg-blue-900 text-blue-200 border border-blue-800">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                        Sistem Server Aktif
                    </span>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto pt-8 border-t border-blue-900/80 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-blue-300/70">
            <p>&copy; 2026 PT Iben Logistic Nusantara. Seluruh hak cipta dilindungi undang-undang.</p>
            <p class="text-center sm:text-right">Latihan Ujikom Pemrograman Web &bull; Bersih & Profesional</p>
        </div>
    </footer>

    <!-- ══════════════════════════════════════════════════════════
         INTERACTIVE SCRIPTS (TRACKING, FILTERS, LIGHTBOX)
    ══════════════════════════════════════════════════════════ -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        // Inisialisasi Lucide icons
        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
            initTracking();
            initArmadaFilter();
            initGalleryFilter();
            initMobileMenu();
            initContactForm();
        });

        // 1. Mobile Menu Toggle
        function initMobileMenu() {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const openIcon = document.getElementById('menu-icon-open');
            const closeIcon = document.getElementById('menu-icon-close');
            const links = document.querySelectorAll('.mobile-nav-link');

            if (!btn || !menu) return;

            btn.addEventListener('click', () => {
                const isOpen = !menu.classList.contains('hidden');
                if (isOpen) {
                    menu.classList.add('hidden');
                    openIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                } else {
                    menu.classList.remove('hidden');
                    openIcon.classList.add('hidden');
                    closeIcon.classList.remove('hidden');
                }
            });

            links.forEach(link => {
                link.addEventListener('click', () => {
                    menu.classList.add('hidden');
                    openIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                });
            });
        }

        // 2. Tracking Cek Resi Functionality
        function initTracking() {
            const form = document.getElementById('tracking-form');
            const input = document.getElementById('resi-input');
            const btn = document.getElementById('btn-track');
            const btnText = document.getElementById('btn-text');
            const btnLoading = document.getElementById('btn-loading');
            const resultBox = document.getElementById('tracking-result');
            const errorBox = document.getElementById('tracking-error');
            const errorMsg = document.getElementById('error-message');
            const sampleBtns = document.querySelectorAll('.sample-resi-btn');

            if (!form) return;

            // Quick chip clicks
            sampleBtns.forEach(b => {
                b.addEventListener('click', () => {
                    input.value = b.getAttribute('data-resi');
                    fetchResi(input.value);
                });
            });

            // Auto-check URL query parameter (?resi=IBN-0001)
            const urlParams = new URLSearchParams(window.location.search);
            const queryResi = urlParams.get('resi');
            if (queryResi) {
                input.value = queryResi;
                fetchResi(queryResi);
            }

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                fetchResi(input.value.trim());
            });

            async function fetchResi(resiQuery) {
                if (!resiQuery) return;

                btn.disabled = true;
                btnText.classList.add('hidden');
                btnLoading.classList.remove('hidden');
                btnLoading.classList.add('flex');
                errorBox.classList.add('hidden');
                resultBox.classList.add('hidden');

                try {
                    const response = await fetch(`/lacak-resi?resi=${encodeURIComponent(resiQuery)}`, {
                        headers: {
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });
                    const data = await response.json();

                    if (data.success && data.data) {
                        renderTrackingResult(data.data);
                    } else {
                        errorMsg.textContent = data.message || 'Data pengiriman tidak ditemukan.';
                        errorBox.classList.remove('hidden');
                    }
                } catch (err) {
                    console.error(err);
                    errorMsg.textContent = 'Terjadi gangguan saat mengambil data. Silakan coba sesaat lagi.';
                    errorBox.classList.remove('hidden');
                } finally {
                    btn.disabled = false;
                    btnText.classList.remove('hidden');
                    btnLoading.classList.add('hidden');
                    btnLoading.classList.remove('flex');
                    lucide.createIcons();
                }
            }

            function renderTrackingResult(item) {
                document.getElementById('res-resi').textContent = item.resi;
                document.getElementById('res-pelanggan').textContent = item.pelanggan;
                document.getElementById('res-tujuan').textContent = item.tujuan;
                document.getElementById('res-layanan').textContent = item.layanan;
                document.getElementById('res-tanggal').textContent = item.tanggal;

                const badge = document.getElementById('res-status-badge');
                const step4Icon = document.getElementById('step-icon-4');
                const step4Text = document.getElementById('step-text-4');

                if (item.status === 'Selesai') {
                    badge.className = 'inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-300';
                    badge.innerHTML = '<i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-600"></i> Paket Berhasil Diterima';
                    step4Icon.className = 'w-8 h-8 rounded-full bg-emerald-600 text-white flex items-center justify-center mb-1.5 shadow-xs';
                    step4Text.className = 'font-semibold text-emerald-700';
                } else if (item.status === 'Dalam Proses') {
                    badge.className = 'inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold bg-blue-100 text-blue-800 border border-blue-300';
                    badge.innerHTML = '<i data-lucide="truck" class="w-4 h-4 text-blue-600"></i> Sedang Dalam Perjalanan';
                    step4Icon.className = 'w-8 h-8 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center mb-1.5 shadow-xs';
                    step4Text.className = 'font-semibold text-slate-500';
                } else {
                    badge.className = 'inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-300';
                    badge.innerHTML = '<i data-lucide="clock" class="w-4 h-4 text-amber-600"></i> ' + item.status;
                    step4Icon.className = 'w-8 h-8 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center mb-1.5 shadow-xs';
                    step4Text.className = 'font-semibold text-slate-500';
                }

                resultBox.classList.remove('hidden');
                lucide.createIcons();
            }
        }

        // 3. Armada Filter Tabs
        function initArmadaFilter() {
            const buttons = document.querySelectorAll('.armada-filter-btn');
            const cards = document.querySelectorAll('.armada-card');

            buttons.forEach(btn => {
                btn.addEventListener('click', () => {
                    buttons.forEach(b => {
                        b.classList.remove('bg-blue-900', 'text-white');
                        b.classList.add('bg-slate-100', 'text-slate-700', 'border', 'border-slate-200');
                    });
                    btn.classList.add('bg-blue-900', 'text-white');
                    btn.classList.remove('bg-slate-100', 'text-slate-700', 'border', 'border-slate-200');

                    const filter = btn.getAttribute('data-filter');
                    cards.forEach(card => {
                        if (filter === 'all' || card.getAttribute('data-type') === filter) {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        }

        // 4. Galeri Filter Tabs
        function initGalleryFilter() {
            const buttons = document.querySelectorAll('.gallery-filter-btn');
            const cards = document.querySelectorAll('.gallery-card');

            buttons.forEach(btn => {
                btn.addEventListener('click', () => {
                    buttons.forEach(b => {
                        b.classList.remove('bg-blue-900', 'text-white');
                        b.classList.add('bg-white', 'text-slate-700', 'border', 'border-slate-200');
                    });
                    btn.classList.add('bg-blue-900', 'text-white');
                    btn.classList.remove('bg-white', 'text-slate-700', 'border', 'border-slate-200');

                    const filter = btn.getAttribute('data-filter');
                    cards.forEach(card => {
                        if (filter === 'all' || card.getAttribute('data-category') === filter) {
                            card.style.display = 'flex';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        }

        // 5. Lightbox Modal Functionality
        function openLightbox(imgUrl, title, category, desc) {
            const modal = document.getElementById('lightbox-modal');
            const img = document.getElementById('lightbox-img');
            const cat = document.getElementById('lightbox-cat');
            const tit = document.getElementById('lightbox-title');
            const d = document.getElementById('lightbox-desc');

            img.src = imgUrl;
            cat.textContent = category;
            tit.textContent = title;
            d.textContent = desc;

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
            lucide.createIcons();
        }

        function closeLightboxDirect() {
            const modal = document.getElementById('lightbox-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        function closeLightbox(e) {
            if (e.target.id === 'lightbox-modal') {
                closeLightboxDirect();
            }
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeLightboxDirect();
            }
        });

        // 6. Contact Form Simulated Submit
        function initContactForm() {
            const form = document.getElementById('contact-form');
            const success = document.getElementById('contact-success');
            if (!form) return;

            form.addEventListener('submit', (e) => {
                e.preventDefault();
                success.classList.remove('hidden');
                form.reset();
                lucide.createIcons();
                setTimeout(() => {
                    success.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 100);
            });
        }
    </script>
</body>
</html>
