<?php

namespace Database\Seeders;

use App\Models\AnggotaTim;
use App\Models\Armada;
use App\Models\Galeri;
use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    public function run(): void
    {
        // Update foto anggota tim
        AnggotaTim::where('email', 'ibnu@ibenlogistic.co.id')->update(['foto' => 'anggota-tim/ibnu-anjang.jpg']);
        AnggotaTim::where('email', 'rian.operasional@ibenlogistic.co.id')->update(['foto' => 'anggota-tim/rian-pratama.jpg']);
        AnggotaTim::where('email', 'siti.logistik@ibenlogistic.co.id')->update(['foto' => 'anggota-tim/siti-nurhaliza.jpg']);
        AnggotaTim::where('email', 'cs@ibenlogistic.co.id')->update(['foto' => 'anggota-tim/dewi-anggraini.jpg']);

        // Update foto sebagian armada
        Armada::where('tipe', 'Mobil Van')->take(8)->update(['foto' => 'armada/mobil-van.jpg']);
        Armada::where('tipe', 'Truk Berat')->take(10)->update(['foto' => 'armada/truk-tronton.jpg']);

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
            Galeri::firstOrCreate(['judul' => $g['judul']], $g);
        }
    }
}
