<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel "program" (singular) — sesuai migrasi Anda yang sudah ada
            $table->foreignId('program_id')
                ->nullable()
                ->constrained('program')
                ->nullOnDelete();

            $table->string('nama_lengkap');
            $table->string('nama_wali');
            $table->string('email');
            $table->string('no_telepon');
            $table->text('alamat');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('dokumen')->nullable();

            // baru -> diproses -> diterima / ditolak
            $table->enum('status', ['baru', 'diproses', 'diterima', 'ditolak'])
                ->default('baru');

            $table->text('catatan_admin')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};