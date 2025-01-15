<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ess_trkehadiran', function (Blueprint $table) {
            $table->id('khd_id'); // Primary Key Auto Increment
            $table->string('kry_id', 10); // Foreign Key
            $table->time('khd_log_masuk')->nullable();
            $table->time('khd_log_keluar')->nullable();
            $table->string('khd_status_kehadiran', 20)->nullable();
            $table->string('khd_keterangan_kehadiran', 20)->nullable();
            $table->string('khd_catatan', 100)->nullable();
            $table->string('kry_created_by', 50)->nullable();
            $table->dateTime('kry_created_date')->nullable();
            $table->string('kry_modif_by', 50)->nullable();
            $table->dateTime('kry_modif_date')->nullable();

            // Foreign Key Constraint
            $table->foreign('kry_id')->references('kry_id')->on('ess_mskaryawan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ess_trkehadiran');
    }
};
