<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ess_mspendidikan', function (Blueprint $table) {
            $table->id('dde_id'); // Primary key auto increment
            $table->unsignedBigInteger('dos_id')->nullable();
            $table->string('dde_jenjang', 20)->nullable();
            $table->string('dde_status', 15)->nullable();
            $table->string('dde_created_by', 50)->nullable();
            $table->dateTime('dde_created_date')->nullable();
            $table->string('dde_modif_by', 50)->nullable();
            $table->dateTime('dde_modif_date')->nullable();
            $table->string('kry_id', 10)->nullable();
            
            $table->foreign('kry_id')->references('kry_id')->on('ess_mskaryawan')->nullOnDelete();
            $table->foreign('dos_id')->references('dos_id')->on('sia_msdosen')->nullOnDelete();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('ess_mspendidikan');
    }
};
