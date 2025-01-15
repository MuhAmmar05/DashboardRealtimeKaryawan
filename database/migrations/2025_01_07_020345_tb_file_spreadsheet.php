<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dkw_trfilespreadsheet', function (Blueprint $table) {
            $table->id('fsp_id'); // Primary Key Auto Increment
            $table->string('fsp_namaFile', 100)->nullable();
            $table->string('fsp_status', 15)->nullable();
            $table->string('fsp_created_by', 50)->nullable();
            $table->dateTime('fsp_created_date')->nullable();
            $table->string('fsp_modif_by', 50)->nullable();
            $table->dateTime('fsp_modif_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dkw_trfilespreadsheet');
    }
};
