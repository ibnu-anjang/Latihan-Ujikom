<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kategori')->default('Armada'); // Armada, Fasilitas, Gudang, Operasional
            $table->string('foto');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['Aktif', 'Nonaktif'])->default('Aktif');
            $table->integer('urutan')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('galeris');
    }
};
