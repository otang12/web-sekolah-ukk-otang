<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jurusan_fotos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jurusan_id')->constrained('jurusans')->cascadeOnDelete();
            $table->string('file');
            $table->unsignedInteger('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jurusan_fotos');
    }
};