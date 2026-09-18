<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin Iben Logistic',
            'email' => 'admin@ibenlogistic.co.id',
            'password' => bcrypt('password'),
        ]);

        \App\Models\Service::create([
            'nama' => 'Angkutan Darat',
            'deskripsi' => 'Transportasi jalan raya yang aman dan efisien untuk semua jenis kargo.',
            'ikon' => 'Truck',
            'status' => 'Aktif',
        ]);
        \App\Models\Service::create([
            'nama' => 'Kargo Udara',
            'deskripsi' => 'Solusi pengiriman ekspres untuk kiriman sensitif waktu.',
            'ikon' => 'Plane',
            'status' => 'Aktif',
        ]);
        \App\Models\Service::create([
            'nama' => 'Pergudangan',
            'deskripsi' => 'Fasilitas penyimpanan aman dengan pemantauan 24 jam dan manajemen inventaris.',
            'ikon' => 'Package',
            'status' => 'Aktif',
        ]);

        \App\Models\AnggotaTim::create([
            'nama' => 'Ibnu Anjang Al-Anwari',
            'jabatan' => 'Founder & Chief Executive Officer',
            'email' => 'ibnu@ibenlogistic.co.id',
            'foto' => 'anggota-tim/ibnu-anjang.jpg',
            'status' => 'Aktif',
        ]);
        \App\Models\AnggotaTim::create([
            'nama' => 'Rian Pratama',
            'jabatan' => 'Direktur Operasional & Armada',
            'email' => 'rian.operasional@ibenlogistic.co.id',
            'foto' => 'anggota-tim/rian-pratama.jpg',
            'status' => 'Aktif',
        ]);
        \App\Models\AnggotaTim::create([
            'nama' => 'Siti Nurhaliza',
            'jabatan' => 'Manager Logistik & Gudang',
            'email' => 'siti.logistik@ibenlogistic.co.id',
            'foto' => 'anggota-tim/siti-nurhaliza.jpg',
            'status' => 'Aktif',
        ]);
        \App\Models\AnggotaTim::create([
            'nama' => 'Dewi Anggraini',
            'jabatan' => 'Kepala Layanan Pelanggan (CS)',
            'email' => 'cs@ibenlogistic.co.id',
            'foto' => 'anggota-tim/dewi-anggraini.jpg',
            'status' => 'Aktif',
        ]);

        // Seed Galeri
        $galeris = [
            [
                'judul' => 'Armada Truk Tronton Ekspedisi',
                'kategori' => 'Armada',
                'foto' => 'galeri/truk-berat.jpg',
                'keterangan' => 'Armada truk muatan berat untuk rute antar kota dan provinsi di seluruh Indonesia.',
                'status' => 'Aktif',
                'urutan' => 1,
            ],
            [
                'judul' => 'Terminal & Handling Kargo Udara',
                'kategori' => 'Operasional',
                'foto' => 'galeri/kargo-udara.jpg',
                'keterangan' => 'Penanganan cepat kargo udara prioritas dengan standar keselamatan internasional.',
                'status' => 'Aktif',
                'urutan' => 2,
            ],
            [
                'judul' => 'Fasilitas Pergudangan Modern',
                'kategori' => 'Gudang',
                'foto' => 'galeri/interior-gudang.jpg',
                'keterangan' => 'Gudang terpusat dengan sistem manajemen inventaris canggih dan keamanan 24 jam.',
                'status' => 'Aktif',
                'urutan' => 3,
            ],
            [
                'judul' => 'Unit Penyimpanan Dingin (Cold Storage)',
                'kategori' => 'Fasilitas',
                'foto' => 'galeri/cold-storage.jpg',
                'keterangan' => 'Fasilitas cold storage berstandar tinggi untuk produk farmasi dan bahan pangan segar.',
                'status' => 'Aktif',
                'urutan' => 4,
            ],
            [
                'judul' => 'Dermaga & Muat Peti Kemas Pelabuhan',
                'kategori' => 'Operasional',
                'foto' => 'galeri/dermaga-pelabuhan.jpg',
                'keterangan' => 'Konektivitas maritim terpadu untuk pengiriman peti kemas antar pulau di Nusantara.',
                'status' => 'Aktif',
                'urutan' => 5,
            ],
            [
                'judul' => 'Pusat Perawatan & Inspeksi Armada',
                'kategori' => 'Fasilitas',
                'foto' => 'galeri/pusat-perawatan.jpg',
                'keterangan' => 'Perawatan rutin berkala memastikan seluruh armada selalu dalam kondisi prima dan laik jalan.',
                'status' => 'Aktif',
                'urutan' => 6,
            ],
        ];

        foreach ($galeris as $g) {
            \App\Models\Galeri::create($g);
        }

        // Seed Pengiriman
        $pengirimans = [
            ['pelanggan' => 'PT Astra International', 'tujuan' => 'Surabaya, Jawa Timur', 'layanan' => 'Angkutan Darat', 'status' => 'Selesai', 'tanggal' => '2026-09-01'],
            ['pelanggan' => 'CV Maju Bersama', 'tujuan' => 'Medan, Sumatera Utara', 'layanan' => 'Kargo Udara', 'status' => 'Dalam Proses', 'tanggal' => '2026-09-08'],
            ['pelanggan' => 'PT Indofood Makmur', 'tujuan' => 'Semarang, Jawa Tengah', 'layanan' => 'Pergudangan', 'status' => 'Selesai', 'tanggal' => '2026-09-04'],
            ['pelanggan' => 'PT Nusantara Bahari', 'tujuan' => 'Makassar, Sulawesi Selatan', 'layanan' => 'Kargo Laut', 'status' => 'Dalam Proses', 'tanggal' => '2026-09-09'],
            ['pelanggan' => 'UD Berkah Sejahtera', 'tujuan' => 'Bandung, Jawa Barat', 'layanan' => 'Angkutan Darat', 'status' => 'Selesai', 'tanggal' => '2026-09-07'],
            ['pelanggan' => 'Toko Elektronik Sentosa', 'tujuan' => 'Yogyakarta', 'layanan' => 'Angkutan Darat', 'status' => 'Tertunda', 'tanggal' => '2026-09-10'],
        ];

        foreach ($pengirimans as $p) {
            \App\Models\Pengiriman::create($p);
        }

        // Tambah 94 data pengiriman sukses historis untuk statistik profesional
        for ($k = 1; $k <= 94; $k++) {
            \App\Models\Pengiriman::create([
                'pelanggan' => 'Klien Korporat #' . $k,
                'tujuan' => ['Jakarta', 'Surabaya', 'Semarang', 'Bandung', 'Medan', 'Denpasar', 'Balikpapan'][$k % 7],
                'layanan' => ['Angkutan Darat', 'Kargo Udara', 'Pergudangan', 'Kargo Laut'][$k % 4],
                'status' => 'Selesai',
                'tanggal' => now()->subDays($k)->toDateString(),
            ]);
        }

        for ($i = 1; $i <= 55; $i++) {
            \App\Models\Armada::create([
                'nomorKendaraan' => 'B ' . (1000 + $i) . ' IL',
                'tipe' => $i % 3 === 0 ? 'Truk Box' : ($i % 5 === 0 ? 'Mobil Van' : 'Truk Berat'),
                'kapasitas' => $i % 3 === 0 ? '4 Ton' : ($i % 5 === 0 ? '1.5 Ton' : '10 Ton'),
                'driver' => 'Driver ' . $i,
                'foto' => $i % 5 === 0 ? 'armada/mobil-van.jpg' : ($i % 2 === 0 ? 'armada/truk-tronton.jpg' : null),
                'status' => $i % 7 === 0 ? 'Servis' : ($i % 4 === 0 ? 'Beroperasi' : 'Tersedia'),
            ]);
        }
    }
}
