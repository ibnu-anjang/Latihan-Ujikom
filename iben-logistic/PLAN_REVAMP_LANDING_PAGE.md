# 📋 DOKUMEN RENCANA STRATEGIS (PLANNING)
# Revamp Total Landing Page Iben Logistic: Integrasi Penuh Modul Dinamis & Optimasi Visual Responsif

*Dokumen ini disusun untuk panduan komprehensif penataan ulang antarmuka publik (Landing Page) Iben Logistic agar seluruh modul sistem (Pengiriman, Layanan, Armada, Galeri Foto, dan Anggota Tim) terintegrasi penuh secara dinamis dari database dan tampilan visual terbebas dari masalah layout/gambar terpotong.*

---

## 📌 DAFTAR ISI
1. [Latar Belakang & Analisis Masalah Saat Ini](#1-latar-belakang--analisis-masalah-saat-ini)
2. [Tujuan & Sasaran Revamp](#2-tujuan--sasaran-revamp)
3. [Arsitektur Integrasi Data Dinamis](#3-arsitektur-integrasi-data-dinamis)
   - 3.1 [Modul Pengiriman: Widget Cek Resi & Live Tracking](#31-modul-pengiriman-widget-cek-resi--live-tracking)
   - 3.2 [Modul Layanan: Katalog Layanan Terpadu & Interaktif](#32-modul-layanan-katalog-layanan-terpadu--interaktif)
   - 3.3 [Modul Armada: Showcase & Katalog Kendaraan Terverifikasi](#33-modul-armada-showcase--katalog-kendaraan-terverifikasi)
   - 3.4 [Modul Galeri Foto: Grid 3-Kolom Proporsional & Filter Kategori](#34-modul-galeri-foto-grid-3-kolom-proporsional--filter-kategori)
   - 3.5 [Modul Anggota Tim: Showcase Tim Manajemen Profesional](#35-modul-anggota-tim-showcase-tim-manajemen-profesional)
4. [Solusi Teknis Masalah Layout & Aspek Rasio Gambar](#4-solusi-teknis-masalah-layout--aspek-rasio-gambar)
5. [Desain Struktur & Wireframe Navigasi Baru](#5-desain-struktur--wireframe-navigasi-baru)
6. [Langkah-Langkah Eksekusi (Roadmap Implementasi)](#6-langkah-langkah-eksekusi-roadmap-implementasi)
7. [Metode Pengujian & Verifikasi Mutu](#7-metode-pengujian--verifikasi-mutu)

---

## 1. LATAR BELAKANG & ANALISIS MASALAH SAAT INI

Berdasarkan tinjauan langsung pada tangkapan layar antarmuka pengguna (`uploaded_media_1789717496124.png`) serta audit kode pada `welcome.blade.php`, ditemukan beberapa permasalahan kritis:

### A. Masalah Visual & Layout (Gambar Terpotong / Gepeng)
1. **Kartu Galeri Menumpuk 1 Kolom Penuh:**
   - Bagian *"Armada & Fasilitas Kami"* ter-render dalam 1 kolom vertikal yang membentang selebar kontainer utama (`max-w-7xl` atau ~1280px).
   - Tinggi kontainer gambar dipatok statis pada `h-52` (208px).
   - Akibatnya, rasio aspek menjadi sangat ekstrem (**~6 : 1**) mirip pita horizontal yang sangat pipih.
2. **Pemotongan Gambar Ekstrem (`object-cover` Failure):**
   - Foto resolusi normal berorientasi lanskap (3:2) seperti `truk-berat.jpg` (800x533) dipaksa mengisi lebar 1200px. Skala gambar membesar hingga tinggi 800px, namun dipotong paksa menjadi setinggi 208px saja. Bagian atas dan bawah terpotong hingga 74%, menyisakan langit biru kosong tanpa menampilkan badan truk sama sekali.
   - Foto berorientasi potret seperti `cold-storage.jpg` (800x1067) terpotong hingga lebih dari 85%.
   - Foto teknisi `pusat-perawatan.jpg` hanya menyisakan bagian dahi kepala.
3. **Aset CSS Tailwind V4 Belum Ter-compile Ulang:**
   - File build CSS bawaan (`public/build/assets/app-*.css`) adalah hasil build lama yang belum mengenali class utility responsif seperti `sm:grid-cols-2 lg:grid-cols-3`. Akibatnya browser hanya menerapkan fallback dasar `grid-cols-1`.

### B. Keterbatasan Integrasi Data Dinamis
1. **Modul Armada (55 Kendaraan Aktif di Database):**
   - Saat ini tabel `armadas` memiliki data lengkap (Plat Nomor, Tipe Truk/Van, Kapasitas Muatan, Nama Driver, Status Servis, dan Foto).
   - Namun di Landing Page publik, data ini **sama sekali belum ditampilkan** sebagai katalog kendaraan. Pengunjung hanya melihat teks statis angka "55+ Armada Kendaraan" di bagian Tentang Kami.
2. **Modul Pengiriman (100 Transaksi di Database):**
   - Tabel `pengirimen` memiliki 100 data transaksi riil (Nomor Resi/ID, Pelanggan, Tujuan, Layanan, Tanggal, dan Status: *Dalam Proses*, *Selesai*, *Tertunda*).
   - Di Landing Page belum ada fitur interaktif untuk pengunjung melacak resi pengiriman mereka (*Shipment Tracking*).
3. **Modul Layanan (`Service`):**
   - Sudah mengambil data dari database, namun kartu tampil sangat sederhana, tanpa opsi interaksi detail spesifikasi ataupun aksi pemesanan langsung (*CTA*).

---

## 2. TUJUAN & SASARAN REVAMP

1. **100% Dinamis:** Kelima modul sistem (`Layanan`, `Armada`, `Pengiriman`, `Galeri`, `Anggota Tim`) terintegrasi langsung dengan database MariaDB via Eloquent ORM.
2. **Visual Presisi & Proporsional:** Menghilangkan tampilan gepeng dan potongan gambar yang merusak estetika, menggunakan rasio standar `aspect-[16/10]` dan grid 3-kolom modern.
3. **Fitur Unggulan Nilai Tambah (Ujikom Level):**
   - **Widget Cek Resi Interaktif (Live Tracking):** Pengunjung dapat memasukkan nomor resi/nama untuk mengetahui status paket secara langsung.
   - **Katalog Armada Interaktif:** Pengunjung dapat memfilter armada berdasarkan tipe kendaraan (Truk Tronton, Truk Box, Mobil Van).
   - **Modal Lightbox Galeri:** Foto fasilitas dan operasional dapat diklik untuk melihat resolusi penuh tanpa terpotong.

---

## 3. ARSITEKTUR INTEGRASI DATA DINAMIS

### 3.1 Modul Pengiriman: Widget Cek Resi & Live Tracking
- **Sumber Data:** Model `Pengiriman` (`App\Models\Pengiriman`).
- **Penempatan:** Floating Banner di bawah Hero Section dan menu navigasi.
- **Mekanisme Fitur:**
  1. Pengunjung memasukkan Nomor Resi (format contoh: `IBN-0001` s/d `IBN-0100` atau mencari berdasarkan nama perusahaan mitra, misal "Astra").
  2. Sistem mencari data via AJAX / Endpoint controller `/api/track` atau live search.
  3. Menampilkan status card interaktif:
     - **Status Badge:** `Dalam Proses` (Kuning), `Selesai` (Hijau), `Tertunda` (Merah).
     - **Timeline Alur Pengiriman:**
       - Step 1: Penjemputan / Muat Barang
       - Step 2: Dalam Perjalanan Darat/Udara/Laut
       - Step 3: Tiba di Hub Transit Logistik
       - Step 4: Selesai Diterima Klien
     - **Informasi Transaksi:** Nama Pelanggan, Kota Tujuan, Jenis Layanan, Tanggal Kirim, Estimasi Tiba.
  4. **Live Activity Feed:** Menampilkan 3-4 data pengiriman terkini secara ringkas sebagai bukti aktivitas operasional perusahaan.

### 3.2 Modul Layanan: Katalog Layanan Terpadu & Interaktif
- **Sumber Data:** Model `Service` (`App\Models\Service::where('status', 'Aktif')->get()`).
- **Mekanisme Fitur:**
  - Menampilkan kartu layanan lengkap dengan icon Lucide dinamis (`truck`, `plane`, `package`, `ship`, `shield-check`).
  - Dilengkapi detail cakupan rute dan kapasitas muatan.
  - Tombol aksi: *"Pesan Layanan"* yang langsung memicu form kontak / penawaran harga dengan layanan otomatis terpilih.

### 3.3 Modul Armada: Showcase & Katalog Kendaraan Terverifikasi
- **Sumber Data:** Model `Armada` (`App\Models\Armada::where('status', 'Tersedia')->orWhere('status', 'Aktif')->get()`).
- **Penempatan:** Bagian tersendiri di halaman utama (`#armada`).
- **Mekanisme Fitur:**
  - **Filter Tab Kategori:** `Semua Armada`, `Truk Berat (Tronton)`, `Truk Box (CDD)`, `Mobil Van Kargo`.
  - **Informasi Kartu Armada:**
    - Foto Kendaraan Resmi beresolusi tajam dengan rasio `aspect-[16/10]`.
    - Nomor Plat Kendaraan (Badge biru gelap kontras, misal `B 1001 IL`).
    - Tipe Kendaraan & Spesifikasi Muatan (misal `10 Ton`, `5 Ton`).
    - Nama Driver Pendamping.
    - Status Kesiapan Operasional (Badge Hijau `Siap Operasi`).

### 3.4 Modul Galeri Foto: Grid 3-Kolom Proporsional & Filter Kategori
- **Sumber Data:** Model `Galeri` (`App\Models\Galeri::where('status', 'Aktif')->orderBy('urutan')->get()`).
- **Penempatan:** Bagian Galeri Fasilitas & Dokumentasi (`#gallery`).
- **Mekanisme Fitur:**
  - **Grid Responsif:** `grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6`.
  - **Aspek Rasio Sempurna:** Kontainer gambar menggunakan `aspect-[16/10]` dengan `object-cover object-center` sehingga seluruh objek truk, gudang, dan terminal kargo terlihat utuh.
  - **Filter Kategori Dinamis:** Tombol filter cepat untuk `Semua`, `Armada`, `Fasilitas`, `Gudang`, `Operasional`.
  - **Modal Lightbox:** Klik gambar untuk memperbesar secara penuh dalam pop-up modal layar penuh.

### 3.5 Modul Anggota Tim: Showcase Tim Manajemen Profesional
- **Sumber Data:** Model `AnggotaTim` (`App\Models\AnggotaTim::where('status', 'Aktif')->get()`).
- **Penempatan:** Bagian *"Kenali Pemimpin Kami"* (`#team`).
- **Mekanisme Fitur:**
  - Foto avatar lingkaran proporsional (`w-24 h-24 rounded-full object-cover`).
  - Nama, Jabatan, Email resmi, dan link kontak staf pimpinan.

---

## 4. SOLUSI TEKNIS MASALAH LAYOUT & ASPEK RASIO GAMBAR

| Masalah Lama | Akar Penyebab | Solusi Baru yang Direncanakan |
|---|---|---|
| **Kartu membentang 1 kolom penuh (1200px lebar)** | Class utility `sm:grid-cols-2 lg:grid-cols-3` tidak ada dalam CSS ter-compile karena belum di-build ulang. | Memasukkan CSS grid responsif inline murni atau meng-compile Tailwind via Vite sehingga layout 3 kolom aktif di semua layar. |
| **Gambar terpotong/gepeng (pita 208px tinggi)** | Penggunaan tinggi statis `h-52` pada lebar kartu yang tidak terbatas. | Mengganti menjadi rasio aspek proporsional `aspect-[16/10]` atau `aspect-[4/3]` dengan `object-cover object-center`. |
| **Gambar truk hanya terlihat langit biru** | Posisi *object-fit* tidak terfokus pada subjek utama. | Menyesuaikan *object-position* dan rasio kontainer kartu agar badan kendaraan terlihat utuh dari ban hingga atap. |
| **Tidak bisa melihat foto utuh** | Tidak ada fitur perbesaran gambar. | Menambahkan interaktivitas Lightbox Modal (klik gambar untuk melihat resolusi penuh tanpa crop). |

---

## 5. DESAIN STRUKTUR & WIREFRAME NAVIGASI BARU

Susunan alur Landing Page Iben Logistic yang baru:

```text
[ NAVBAR STICKY ]
├── Logo "Iben Logistic"
└── Menu: Beranda | Lacak Resi | Layanan | Armada | Galeri | Tim | Kontak

[ 1. HERO SECTION ]
├── Headline: "Solusi Logistik yang Aman, Cepat, dan Terpercaya"
├── Sub-headline & CTA Button ("Layanan Kami", "Lacak Pengiriman")
└── [ WIDGET LACAK RESI CEPAT (FLOATING TRACKER) ]
    ├── Input: Nomor Resi / Pelanggan
    ├── Tombol: "Lacak Kargo"
    └── Hasil Instan: Status Stepper, Tujuan, Armada, Estimasi Tiba

[ 2. TENTANG KAMI & STATISTIK DINAMIS ]
├── Profil singkat kredibilitas Iben Logistic
└── 3 Kartu Statistik Real-time:
    ├── 10+ Tahun Pengalaman
    ├── [XX]% Tingkat Keberhasilan Pengiriman (Dihitung dari DB)
    └── [55]+ Armada Kendaraan Siap Operasi (Dihitung dari DB)

[ 3. KATALOG LAYANAN UTAMA (DINAMIS DARI DB) ]
├── Angkutan Darat, Kargo Udara, Pergudangan Modern, Kargo Laut
└── Kartu detail spesifikasi, armada pendukung, dan tombol pemesanan

[ 4. SHOWCASE KATALOG ARMADA KENDARAAN (BARU - DINAMIS) ]
├── Tab Filter: Semua | Truk Berat | Truk Box | Mobil Van
└── Grid Kartu Armada (Foto Kendaraan, Plat Nomor, Kapasitas, Driver, Status Siap)

[ 5. DOKUMENTASI FASILITAS & GALERI (GRID 3-KOLOM BARU) ]
├── Tab Filter Kategori Galeri
├── Grid 3-Kolom Proporsional (No Crop / No Gepeng)
└── Modal Lightbox Full-screen saat foto diklik

[ 6. KENALI TIM MANAJEMEN (DINAMIS DARI DB) ]
└── Profil Pimpinan & Staff Operasional lengkap dengan avatar dan jabatan

[ 7. HUBUNGI KAMI & INTEGRASI FORM ]
├── Informasi Kantor, Telepon, Email, dan Embed Peta
└── Formulir Permintaan Penawaran / Kirim Pesan

[ FOOTER KORPORAT ]
└── Hak cipta © 2026 Iben Logistic & Identitas Akademik
```

---

## 6. LANGKAH-LANGKAH EKSEKUSI (ROADMAP IMPLEMENTASI)

### Tahap 1: Backend Controller & Data Routing (`routes/web.php`)
1. Mengupdate route `/` untuk mengoper seluruh data yang diperlukan ke view:
   - `$services` (Layanan aktif)
   - `$armadas` (Armada kendaraan aktif dan siap operasi)
   - `$armadaTypes` (Daftar unik tipe kendaraan untuk tab filter)
   - `$galeris` (Galeri foto dengan urutan dan kategori)
   - `$galeriCategories` (Daftar unik kategori galeri)
   - `$teamMembers` (Anggota tim aktif)
   - `$recentShipments` (5 pengiriman terbaru untuk live monitoring)
2. Menambahkan route `/lacak-resi` (GET/POST) untuk pencarian resi pengiriman instan secara realtime.

### Tahap 2: Refaktor Antarmuka Blade (`welcome.blade.php`)
1. Mengintegrasikan **Widget Cek Resi** di bawah Hero Section.
2. Memperbaiki bagian **Galeri Foto**:
   - Menggunakan container grid 3-kolom yang teruji kokoh.
   - Mengatur rasio aspek `aspect-[16/10]` dan `overflow-hidden`.
   - Menambahkan JavaScript Lightbox sederhana untuk zoom foto.
3. Menambahkan bagian baru **Katalog Armada Kendaraan**:
   - Menampilkan kartu-kartu armada dengan foto asli, nomor plat, tipe, kapasitas, dan driver.
   - Menambahkan filter tab berbasis JavaScript/Alpine.js.
4. Menambahkan CTA dan modal rincian pada kartu **Layanan**.

### Tahap 3: Build Aset & Pengujian Visual
1. Menjalankan kompilasi aset frontend via Vite (`npm run build`).
2. Melakukan audit render di browser Brave headless pada berbagai breakpoint layar:
   - Layar Lebar Desktop (1920x1080)
   - Layar Laptop (1440x900)
   - Layar Tablet (1024x768 & 768x1024)
   - Layar Smartphone (375x812)
3. Memastikan tidak ada gambar yang terpotong secara aneh maupun tampak gepeng.

### Tahap 4: Dokumentasi & Sinkronisasi Repositori
1. Memperbarui dokumen laporan resmi `laporan_tugas.html`.
2. Meng-generate ulang file PDF resmi `Laporan-Tugas-Pemweb-Ibnu-Anjang.pdf`.
3. Memperbarui `README.md` dengan fitur-fitur baru.
4. Commit dan push ke remote GitHub `git@github.com:ibnu-anjang/Latihan-Ujikom.git`.

---

## 7. METODE PENGUJIAN & VERIFIKASI MUTU

1. **Uji Fungsionalitas Lacak Resi:**
   - Memasukkan nomor resi valid (misal `IBN-0001` atau nama `PT Astra International`).
   - Memastikan data status, asal, tujuan, dan timeline muncul akurat sesuai database.
2. **Uji Filter Armada & Galeri:**
   - Mengklik tab kategori armada dan galeri; memastikan item tersaring secara instan tanpa glitch.
3. **Uji Visual Responsif:**
   - Memeriksa tampilan kartu galeri dan armada: gambar harus terbingkai rapi dalam rasio proporsional di seluruh ukuran layar.
4. **Uji Otomatis PHPUnit:**
   - Menjalankan `php artisan test` untuk memastikan semua route dan fungsionalitas backend berjalan tanpa kendala.

---
*Dokumen Rencana ini disimpan di Desktop: `/home/iben/Desktop/PLAN_REVAMP_LANDING_PAGE_IBEN_LOGISTIC.md`*
