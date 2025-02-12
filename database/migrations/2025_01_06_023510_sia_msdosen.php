<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sia_msdosen', function (Blueprint $table) {
            $table->id('dos_id'); // Primary key auto increment
            $table->string('kry_id', 10)->nullable();
            $table->string('dos_jabatan_akademik', 15)->nullable();
            $table->string('dos_status', 12)->nullable();
            $table->string('dos_created_by', 50)->nullable();
            $table->dateTime('dos_created_date')->nullable();
            $table->string('dos_modif_by', 50)->nullable();
            $table->dateTime('dos_modif_date')->nullable();
            
            $table->foreign('kry_id')->references('kry_id')->on('ess_mskaryawan')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sia_msdosen');
    }
};
