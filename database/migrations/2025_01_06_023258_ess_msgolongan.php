<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ess_msgolongan', function (Blueprint $table) {
            $table->id('gol_id'); // Primary key auto increment
            $table->string('gol_desc', 20)->nullable();
            $table->string('gol_status', 12)->nullable();
            $table->string('gol_created_by', 50)->nullable();
            $table->dateTime('gol_created_date')->nullable();
            $table->string('gol_modif_by', 50)->nullable();
            $table->dateTime('gol_modif_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ess_msgolongan');
    }
};
