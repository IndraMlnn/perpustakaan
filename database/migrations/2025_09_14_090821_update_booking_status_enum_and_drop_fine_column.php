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
          Schema::table('bookings', function (Blueprint $table) {
            // ubah enum status
            $table->enum('status', ['pending', 'approved', 'returned','rejected', 'canceled'])
                  ->default('pending')
                  ->change();

            // hapus kolom fine kalau ada
            if (Schema::hasColumn('bookings', 'fine')) {
                $table->dropColumn('fine');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::table('bookings', function (Blueprint $table) {
            // balikin enum ke versi lama
            $table->enum('status', ['pending', 'approved', 'returned','rejected', 'cancelled', 'overdue'])
                  ->default('pending')
                  ->change();

            // balikin kolom fine (anggapannya integer, nullable)
            $table->integer('fine')->nullable();
        });
    }
};
