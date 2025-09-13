<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    if (!Schema::hasTable('sepeda')) {
        Schema::create('sepeda', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sepeda');
            $table->string('kode_sepeda');
            $table->enum('jenis_sepeda', ['Gunung', 'Balap', 'Lipat', 'Hybrid', 'Listrik', 'BMX', 'Cruiser', 'Fixie', 'Anak', 'Tandem']);
            $table->string('status');
            $table->decimal('harga_hari', 8, 2);
            $table->decimal('harga_jam', 8, 2);
            $table->text('deskripsi_sepeda')->nullable();
            $table->text('ulasan')->nullable();
            $table->string('tag_sepeda')->nullable();
            $table->date('perawatan_terakhir')->nullable();
            $table->integer('stok')->default(0);
            $table->string('gambar_sepeda')->nullable();
        });
    }
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sepeda');
    }
};
