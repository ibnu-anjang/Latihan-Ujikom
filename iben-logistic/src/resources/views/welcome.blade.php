<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iben Logistic</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        html, body { height: 100%; }
        * { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6, .font-display { font-family: 'Instrument Sans', sans-serif; }
        html { scroll-behavior: smooth; }
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-thumb { background: #1e3a8a; border-radius: 2px; }
    </style>
</head>
<body class="min-h-full bg-white text-blue-900">

      <!-- ─── NAVIGASI ─── -->
      <header class="sticky top-0 z-50 bg-white border-b border-blue-100">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between gap-8">
          <span class="font-display text-2xl font-bold text-blue-900 shrink-0">Iben Logistic</span>

          <nav class="hidden md:flex items-center gap-7">
              <a href="#home" class="text-sm font-medium text-blue-900 hover:text-blue-600 transition-colors">Beranda</a>
              <a href="#about" class="text-sm font-medium text-blue-900 hover:text-blue-600 transition-colors">Tentang</a>
              <a href="#services" class="text-sm font-medium text-blue-900 hover:text-blue-600 transition-colors">Layanan</a>
              <a href="#gallery" class="text-sm font-medium text-blue-900 hover:text-blue-600 transition-colors">Galeri</a>
              <a href="#team" class="text-sm font-medium text-blue-900 hover:text-blue-600 transition-colors">Tim</a>
              <a href="#contact" class="text-sm font-medium text-blue-900 hover:text-blue-600 transition-colors">Kontak</a>
          </nav>
        </div>
      </header>

      <!-- ─── HERO ─── -->
      <section id="home" class="bg-blue-900 py-24 px-6">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-center">
          <div>
            <p class="text-blue-300 text-xs font-semibold uppercase tracking-widest mb-4">Mitra Logistik Terpercaya</p>
            <h1 class="font-display text-5xl font-bold text-white leading-tight">
              Solusi Logistik yang Aman, Cepat, dan Terpercaya.
            </h1>
            <p class="mt-5 text-blue-200 text-lg leading-relaxed">
              Mitra terpercaya Anda untuk layanan kargo dan pengiriman di seluruh wilayah — tepat waktu, setiap saat.
            </p>
            <div class="mt-8 flex flex-wrap gap-4">
              <a href="#services" class="px-6 py-3 bg-white text-blue-900 font-semibold rounded-md hover:bg-blue-50 transition-colors text-sm">Layanan Kami</a>
              <a href="#contact" class="px-6 py-3 border border-white text-white font-semibold rounded-md hover:bg-white/10 transition-colors text-sm">Hubungi Kami</a>
            </div>
          </div>
          <div class="flex items-center justify-center">
            <div class="relative">
              <div class="w-56 h-56 rounded-full bg-blue-800/50 flex items-center justify-center">
                <i data-lucide="globe" style="width: 160px; height: 160px;" class="text-white/20" stroke-width="0.8"></i>
              </div>
              <div class="absolute -bottom-4 -right-4 w-24 h-24 rounded-full bg-blue-700/40 flex items-center justify-center">
                <i data-lucide="truck" style="width: 48px; height: 48px;" class="text-white/30" stroke-width="0.8"></i>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ─── TENTANG ─── -->
      <section id="about" class="py-20 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
          <h2 class="font-display text-3xl font-bold text-blue-900 text-center mb-14">Tentang Iben Logistic</h2>
          <div class="grid md:grid-cols-2 gap-16 items-start">
            <div class="space-y-5 text-blue-900/80 leading-relaxed">
              <p>
                Didirikan pada tahun 2014, <strong class="text-blue-900">Iben Logistic</strong> telah berkembang menjadi salah satu perusahaan kargo dan pengiriman paling terpercaya di kawasan ini. Kami mengkhususkan diri dalam manajemen rantai pasok dari ujung ke ujung, menggabungkan pelacakan berbasis teknologi dengan penanganan profesional untuk memastikan setiap kiriman tiba dengan aman dan tepat waktu.
              </p>
              <p>
                Tim profesional logistik kami berkomitmen pada transparansi, ketepatan waktu, dan layanan yang dipersonalisasi. Baik Anda membutuhkan angkutan darat lintas negeri, kargo udara lintas benua, atau pergudangan aman dekat pelabuhan utama, Iben Logistic memiliki armada, infrastruktur, dan keahlian untuk melakukannya.
              </p>
              <p>
                Kami beroperasi di bawah standar kualitas yang ketat dan menjaga kemitraan erat dengan otoritas bea cukai, pengelola pelabuhan, dan freight forwarder untuk menjaga rantai pasokan Anda tetap berjalan lancar.
              </p>
            </div>
            <div class="grid grid-cols-1 gap-5">
              <div class="border border-blue-200 rounded-lg p-6 flex items-center gap-6">
                <span class="font-display text-4xl font-bold text-blue-900">10+</span>
                <span class="text-blue-700 font-medium text-lg">Tahun Pengalaman</span>
              </div>
              <div class="border border-blue-200 rounded-lg p-6 flex items-center gap-6">
                <span class="font-display text-4xl font-bold text-blue-900">{{ $successRate }}%</span>
                <span class="text-blue-700 font-medium text-lg">Tingkat Ketepatan Waktu</span>
              </div>
              <div class="border border-blue-200 rounded-lg p-6 flex items-center gap-6">
                <span class="font-display text-4xl font-bold text-blue-900">{{ max($armadaCount, 1) }}+</span>
                <span class="text-blue-700 font-medium text-lg">Armada Kendaraan</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ─── LAYANAN ─── -->
      <section id="services" class="py-20 px-6 bg-blue-50">
        <div class="max-w-7xl mx-auto">
          <h2 class="font-display text-3xl font-bold text-blue-900 text-center mb-3">Layanan Kami</h2>
          <p class="text-center text-blue-700/70 mb-14 text-sm">Solusi logistik lengkap yang disesuaikan untuk bisnis Anda.</p>
          <div class="grid md:grid-cols-3 gap-7">
            @foreach($services as $service)
              <div class="bg-white rounded-lg shadow-lg p-7 flex flex-col gap-4 hover:shadow-xl transition-shadow border border-blue-50">
                <div class="w-12 h-12 bg-blue-900 rounded-md flex items-center justify-center">
                  <i data-lucide="{{ Str::lower($service->ikon) }}" class="text-white"></i>
                </div>
                <h3 class="font-display text-xl font-semibold text-blue-900">{{ $service->nama }}</h3>
                <p class="text-blue-800/70 text-sm leading-relaxed">{{ $service->deskripsi }}</p>
              </div>
            @endforeach
          </div>
        </div>
      </section>

      <!-- ─── GALERI ─── -->
      <section id="gallery" class="py-20 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
          <h2 class="font-display text-3xl font-bold text-blue-900 text-center mb-3">Armada & Fasilitas Kami</h2>
          <p class="text-center text-blue-700/70 mb-14 text-sm">Dokumentasi operasional, fasilitas modern, dan armada andal kami.</p>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($galeris as $item)
              <div class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-blue-100 flex flex-col">
                <div class="relative h-52 w-full overflow-hidden bg-blue-50">
                  <img src="{{ Str::startsWith($item->foto, 'http') ? $item->foto : asset('storage/' . $item->foto) }}" 
                       alt="{{ $item->judul }}" 
                       class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                  <span class="absolute top-3 right-3 bg-blue-900/85 backdrop-blur-sm text-white text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
                    {{ $item->kategori }}
                  </span>
                </div>
                <div class="p-5 flex flex-col flex-grow justify-between">
                  <div>
                    <h3 class="font-display text-base font-bold text-blue-900 group-hover:text-blue-700 transition-colors leading-snug">
                      {{ $item->judul }}
                    </h3>
                    @if($item->keterangan)
                      <p class="text-blue-800/70 text-xs mt-2 line-clamp-2 leading-relaxed">{{ $item->keterangan }}</p>
                    @endif
                  </div>
                </div>
              </div>
            @empty
              <div class="col-span-full py-12 text-center text-blue-500 text-sm">
                Belum ada foto galeri yang dipublikasikan.
              </div>
            @endforelse
          </div>
        </div>
      </section>

      <!-- ─── TIM ─── -->
      <section id="team" class="py-20 px-6 bg-blue-50">
        <div class="max-w-7xl mx-auto">
          <h2 class="font-display text-3xl font-bold text-blue-900 text-center mb-14">Kenali Pemimpin Kami</h2>
          <div class="flex flex-wrap justify-center gap-6">
            @foreach($teamMembers as $member)
            <div class="bg-white shadow-md rounded-xl p-8 flex flex-col items-center gap-4 w-72 border border-blue-100 hover:shadow-lg transition-shadow">
              @if($member->foto)
                <img src="{{ Str::startsWith($member->foto, 'http') ? $member->foto : asset('storage/' . $member->foto) }}" 
                     alt="{{ $member->nama }}" 
                     class="w-24 h-24 rounded-full object-cover shadow-sm border-2 border-blue-200">
              @else
                <div class="w-24 h-24 rounded-full bg-blue-200 flex items-center justify-center border-2 border-blue-300">
                  <span class="font-display text-3xl font-bold text-blue-900">
                      {{ collect(explode(' ', $member->nama))->map(fn($n) => substr($n, 0, 1))->take(2)->join('') }}
                  </span>
                </div>
              @endif
              <div class="text-center">
                <p class="font-display text-xl font-semibold text-blue-900">{{ $member->nama }}</p>
                <p class="text-blue-600 text-sm mt-1 font-medium">{{ $member->jabatan }}</p>
              </div>
              @if($member->email)
              <p class="text-center text-blue-800/70 text-xs leading-relaxed">
                {{ $member->email }}
              </p>
              @endif
            </div>
            @endforeach
          </div>
        </div>
      </section>

      <!-- ─── KONTAK ─── -->
      <section id="contact" class="py-20 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
          <h2 class="font-display text-3xl font-bold text-blue-900 text-center mb-14">Hubungi Kami</h2>
          <div class="grid md:grid-cols-2 gap-16">
            <div class="space-y-8">
              <div class="space-y-5">
                  <div class="flex items-start gap-4">
                    <div class="w-9 h-9 bg-blue-900 rounded-md flex items-center justify-center shrink-0">
                      <i data-lucide="map-pin" class="text-white w-4 h-4"></i>
                    </div>
                    <span class="text-blue-800 text-sm leading-relaxed pt-1.5">Jl. Logistik Utama No. 12, Jakarta Timur, Indonesia 13220</span>
                  </div>
                  <div class="flex items-start gap-4">
                    <div class="w-9 h-9 bg-blue-900 rounded-md flex items-center justify-center shrink-0">
                      <i data-lucide="phone" class="text-white w-4 h-4"></i>
                    </div>
                    <span class="text-blue-800 text-sm leading-relaxed pt-1.5">+62 21 8800 4400</span>
                  </div>
                  <div class="flex items-start gap-4">
                    <div class="w-9 h-9 bg-blue-900 rounded-md flex items-center justify-center shrink-0">
                      <i data-lucide="mail" class="text-white w-4 h-4"></i>
                    </div>
                    <span class="text-blue-800 text-sm leading-relaxed pt-1.5">hello@ibenlogistic.co.id</span>
                  </div>
              </div>
              <div class="bg-blue-50 border border-blue-200 rounded-lg h-52 flex items-center justify-center">
                <span class="text-blue-400 text-sm font-medium">Peta Google Maps</span>
              </div>
            </div>
            <div>
              <form class="space-y-5" onsubmit="event.preventDefault()">
                  <div>
                    <label class="block text-sm font-medium text-blue-900 mb-1.5">Nama</label>
                    <input type="text" placeholder="Nama lengkap Anda"
                      class="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-700 transition" />
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-blue-900 mb-1.5">Email</label>
                    <input type="email" placeholder="anda@email.com"
                      class="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-700 transition" />
                  </div>
                <div>
                  <label class="block text-sm font-medium text-blue-900 mb-1.5">Pesan</label>
                  <textarea rows="5" placeholder="Ceritakan tentang kebutuhan pengiriman atau pertanyaan Anda..."
                    class="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-700 transition resize-none"></textarea>
                </div>
                <button type="submit" class="w-full py-3 bg-blue-900 text-white font-semibold rounded-md hover:bg-blue-800 transition-colors text-sm">
                  Kirim Pesan
                </button>
              </form>
            </div>
          </div>
        </div>
      </section>

      <!-- ─── FOOTER ─── -->
      <footer class="bg-blue-900 py-8 px-6 text-center">
        <p class="text-white/80 text-sm">© 2026 Iben Logistic. Seluruh hak cipta dilindungi undang-undang.</p>
      </footer>
      
      <script src="https://unpkg.com/lucide@latest"></script>
      <script>
        lucide.createIcons();
      </script>
</body>
</html>
