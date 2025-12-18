<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('telepon');
            $table->string('kategori');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->enum('status', ['diterima', 'diproses', 'selesai'])->default('diterima');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};