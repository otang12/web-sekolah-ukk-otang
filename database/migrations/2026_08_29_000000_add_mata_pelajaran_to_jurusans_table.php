<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jurusans', function (Blueprint $table) {
            // Disimpan sebagai JSON: [{"nama": "...", "deskripsi": "..."}, ...]
            $table->json('mata_pelajaran')->nullable()->after('deskripsi_panjang');
        });
    }

    public function down(): void
    {
        Schema::table('jurusans', function (Blueprint $table) {
            $table->dropColumn('mata_pelajaran');
        });
    }
};