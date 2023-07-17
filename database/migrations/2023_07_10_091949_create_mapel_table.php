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
        Schema::create('mapel', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jurusan_id');
            $table->unsignedBigInteger('guru_id');
            $table->string('nama_mapel');
            $table->integer('semester');
            $table->timestamps();

            $table->foreign('jurusan_id')->references('id')->on('jurusan')->cascadeOnDelete();
            $table->foreign('guru_id')->references('id')->on('guru')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapel');
    }
};
