<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');

            // foreign key ke penyewaan
            $table->unsignedBigInteger('id_penyewaan')->nullable();
            $table->foreign('id_penyewaan')->references('id_penyewaan')->on('penyewaan')->onDelete('cascade');

            // foreign key ke users
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->string('metode');
            $table->enum('bank', ['bca', 'bni', 'mandiri', 'bri'])->nullable();
            $table->enum('ewallet', ['dana', 'ovo', 'gopay', 'qris'])->nullable();
            $table->decimal('total', 11, 0);

            $table->timestamps(); // otomatis bikin created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
