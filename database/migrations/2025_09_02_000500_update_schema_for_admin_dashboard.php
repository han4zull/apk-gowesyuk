<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tambah kolom kondisi pada tabel sepeda untuk mendukung status di dashboard
        if (Schema::hasTable('sepeda') && !Schema::hasColumn('sepeda', 'kondisi')) {
            Schema::table('sepeda', function (Blueprint $table) {
                $table->enum('kondisi', ['tersedia', 'disewa', 'maintenance', 'rusak'])
                      ->default('tersedia')
                      ->after('status');
            });

            // Backfill nilai awal berdasarkan kolom status (jika ada)
            try {
                DB::table('sepeda')->whereRaw("LOWER(status) = 'disewa'")->update(['kondisi' => 'disewa']);
                DB::table('sepeda')->whereRaw("LOWER(status) = 'maintenance'")->update(['kondisi' => 'maintenance']);
                DB::table('sepeda')->whereRaw("LOWER(status) = 'rusak'")->update(['kondisi' => 'rusak']);
                DB::table('sepeda')->whereNull('kondisi')->orWhere('kondisi', '')->update(['kondisi' => 'tersedia']);
            } catch (\Throwable $e) {
                // Abaikan jika database tidak mendukung operasi ini saat migrasi awal
            }
        }

        // Tambah kolom lokasi pada tabel penyewaan untuk menampilkan lokasi pada daftar penyewaan terbaru
        if (Schema::hasTable('penyewaan') && !Schema::hasColumn('penyewaan', 'lokasi')) {
            Schema::table('penyewaan', function (Blueprint $table) {
                $table->string('lokasi')->nullable()->after('tanggal');
            });
        }

        // Opsional: indeks yang membantu query statistik (pendapatan per hari, penyewaan terbaru)
        if (Schema::hasTable('pembayaran') && !Schema::hasColumn('pembayaran', 'created_at')) {
            // Jika tabel pembayaran belum memiliki timestamps (harusnya sudah), tambahkan
            Schema::table('pembayaran', function (Blueprint $table) {
                $table->timestamps();
            });
        }

        // Tambahkan index untuk mempercepat query ringkasan jika kolom tersedia
        if (Schema::hasTable('pembayaran')) {
            Schema::table('pembayaran', function (Blueprint $table) {
                // Gunakan try-catch untuk menghindari error jika index sudah ada
                try {
                    $table->index('created_at', 'pembayaran_created_at_index');
                } catch (\Throwable $e) {
                    // abaikan jika sudah ada
                }
            });
        }

        if (Schema::hasTable('penyewaan')) {
            Schema::table('penyewaan', function (Blueprint $table) {
                try {
                    $table->index('created_at', 'penyewaan_created_at_index');
                    $table->index('status', 'penyewaan_status_index');
                } catch (\Throwable $e) {
                    // abaikan jika sudah ada
                }
            });
        }

        if (Schema::hasTable('sepeda')) {
            Schema::table('sepeda', function (Blueprint $table) {
                try {
                    $table->index('kondisi', 'sepeda_kondisi_index');
                } catch (\Throwable $e) {
                    // abaikan jika sudah ada
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('sepeda') && Schema::hasColumn('sepeda', 'kondisi')) {
            Schema::table('sepeda', function (Blueprint $table) {
                // Hapus index jika ada
                try { DB::statement('DROP INDEX sepeda_kondisi_index ON sepeda'); } catch (\Throwable $e) {}
                $table->dropColumn('kondisi');
            });
        }

        if (Schema::hasTable('penyewaan') && Schema::hasColumn('penyewaan', 'lokasi')) {
            Schema::table('penyewaan', function (Blueprint $table) {
                try { DB::statement('DROP INDEX penyewaan_created_at_index ON penyewaan'); } catch (\Throwable $e) {}
                try { DB::statement('DROP INDEX penyewaan_status_index ON penyewaan'); } catch (\Throwable $e) {}
                $table->dropColumn('lokasi');
            });
        }

        if (Schema::hasTable('pembayaran')) {
            Schema::table('pembayaran', function (Blueprint $table) {
                try { DB::statement('DROP INDEX pembayaran_created_at_index ON pembayaran'); } catch (\Throwable $e) {}
                // Jangan drop timestamps karena bisa dipakai bagian lain aplikasi
            });
        }
    }
};
