<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pengirimans', function (Blueprint $table) {
            $table->id();
            $table->string('pelanggan');
            $table->string('tujuan');
            $table->string('layanan'); // or foreign key? let's keep string for simplicity matching the react UI
            $table->enum('status', ['Tertunda', 'Dalam Proses', 'Selesai'])->default('Tertunda');
            $table->date('tanggal');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('pengirimans');
    }
};
