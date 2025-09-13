<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->id('id_penyewaan'); // primary key

            // Relasi ke users
            $table->foreignId('id_user')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Relasi ke sepeda
            $table->foreignId('id_sepeda')
                  ->constrained('sepeda')
                  ->onDelete('cascade');

            // Data sepeda (disimpan untuk arsip transaksi)
            $table->string('nama_sepeda');
            $table->enum('jenis_sepeda', [
                'Gunung', 'Balap', 'Lipat', 'Hybrid', 'Listrik',
                'BMX', 'Cruiser', 'Fixie', 'Anak', 'Tandem'
            ]);
            $table->string('kode_sepeda');
            $table->decimal('harga_jam', 11, 0);
            $table->decimal('harga_hari', 11, 0);

            // durasi sewa
            $table->integer('durasi_jam')->nullable();
            $table->integer('durasi_hari')->nullable();

            // biaya
            $table->decimal('biaya_admin', 11, 0);
            $table->decimal('total', 11, 0);

            // data penyewa
            $table->string('nama_lengkap');
            $table->string('alamat');
            $table->string('email');
            $table->string('nomor_telepon');

            $table->date('tanggal')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penyewaan');
    }
};
