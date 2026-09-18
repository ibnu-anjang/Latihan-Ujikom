<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('anggota_tims', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            $table->string('email');
            $table->enum('status', ['Aktif', 'Cuti'])->default('Aktif');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('anggota_tims');
    }
};
