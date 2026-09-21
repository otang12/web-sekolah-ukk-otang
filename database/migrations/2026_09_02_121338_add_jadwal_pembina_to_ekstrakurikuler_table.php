<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('ekstrakurikulers', function (Blueprint $table) {
        $table->string('jadwal_hari')->nullable();
        $table->string('jadwal_waktu')->nullable();
        $table->string('jadwal_lokasi')->nullable();
        $table->string('pembina_nama')->nullable();
        $table->string('pembina_jabatan')->nullable();
        $table->string('pembina_foto')->nullable();
        $table->text('pembina_sambutan')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ekstrakurikulers', function (Blueprint $table) {
            //
        });
    }
};
