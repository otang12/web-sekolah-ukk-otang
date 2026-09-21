<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('npsn')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('principal_name')->nullable();
            $table->text('description')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->string('logo')->nullable();
            $table->unsignedSmallInteger('founded_year')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_profiles');
    }
};
