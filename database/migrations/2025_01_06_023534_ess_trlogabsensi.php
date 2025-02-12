<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ess_trlogabsensi', function (Blueprint $table) {
            $table->id('log_index_id');
            $table->dateTime('log_tanggal');
            $table->time('log_jam_kerja_masuk')->nullable();
            $table->time('log_jam_kerja_keluar')->nullable();
            $table->string('log_user_id', 10)->nullable();
            $table->string('log_created_by', 50)->nullable();
            $table->dateTime('log_created_date')->nullable();
            $table->string('log_modif_by', 50)->nullable();
            $table->dateTime('log_modif_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ess_trlogabsensi');
    }
};
