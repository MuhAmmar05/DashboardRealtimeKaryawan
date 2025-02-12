<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ess_mskalender', function (Blueprint $table) {
            $table->id('kal_id');
            $table->string('kal_desc', 100);
            $table->dateTime('kal_tgl_libur_from');
            $table->dateTime('kal_tgl_libur_until');
            $table->string('kal_status', 12)->nullable();
            $table->string('kal_created_by', 50)->nullable();
            $table->dateTime('kal_created_date')->nullable();
            $table->string('kal_modif_by', 50)->nullable();
            $table->dateTime('kal_modif_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ess_mskalender');
    }
};
