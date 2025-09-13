<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();

            // Relasi ke user
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Relasi ke penyewaan (manual karena PK = id_penyewaan)
            $table->unsignedBigInteger('penyewaan_id');
            $table->foreign('penyewaan_id')
                  ->references('id_penyewaan')
                  ->on('penyewaan')
                  ->onDelete('cascade');

            // Data duplikat (disalin dari penyewaan saat laporan dibuat)
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('nomor_telepon');
            $table->string('nama_sepeda');
            $table->string('kode_sepeda');
            $table->date('tanggal')->nullable();

            // Info laporan
            $table->string('judul');       // judul kerusakan
            $table->string('kategori');    // kategori kerusakan
            $table->enum('status', ['pending', 'in_progress', 'resolved'])
                  ->default('pending');
            $table->integer('rating')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
