<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('armadas', function (Blueprint $table) {
            $table->id();
            $table->string('nomorKendaraan');
            $table->string('tipe');
            $table->string('kapasitas');
            $table->string('driver');
            $table->enum('status', ['Tersedia', 'Beroperasi', 'Servis'])->default('Tersedia');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('armadas');
    }
};
