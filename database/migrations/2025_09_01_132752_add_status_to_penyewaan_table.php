<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::table('penyewaan', function (Blueprint $table) {
        $table->enum('status', ['proses', 'selesai', 'batal'])
              ->default('proses')
              ->after('tanggal');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
{
    Schema::table('penyewaan', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}
};
