<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ess_mskaryawan', function (Blueprint $table) {
            $table->string('kry_id', 10)->primary(); // Primary Key dengan varchar(10)
            $table->string('kry_nama_depan', 100)->nullable();
            $table->string('kry_nama_blkg', 100)->nullable();
            $table->string('kry_username', 50)->nullable();
            $table->dateTime('kry_tgl_lahir')->nullable();
            $table->char('kry_jenis_kelamin', 2)->nullable();
            
            // Foreign Keys
            $table->unsignedBigInteger('jab_main_id')->nullable();
            $table->unsignedBigInteger('jab_sec_id')->nullable();
            $table->unsignedBigInteger('gol_id')->nullable();

            $table->dateTime('kry_tgl_masuk_kerja')->nullable();
            $table->string('kry_status', 12)->nullable();
            $table->string('kry_created_by', 50)->nullable();
            $table->dateTime('kry_created_date')->nullable();
            $table->string('kry_modif_by', 50)->nullable();
            $table->dateTime('kry_modif_date')->nullable();

            // Constraints
            $table->foreign('jab_main_id')->references('jab_id')->on('ess_msjabatan')->nullOnDelete();
            $table->foreign('jab_sec_id')->references('jab_id')->on('ess_msjabatan')->nullOnDelete();
            $table->foreign('gol_id')->references('gol_id')->on('ess_msgolongan')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ess_mskaryawan');
    }
};
