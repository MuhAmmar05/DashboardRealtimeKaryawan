<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ess_msjabatan', function (Blueprint $table) {
            $table->id('jab_id'); // Primary key auto increment
            $table->string('jab_desc', 20)->nullable();
            $table->string('jab_status', 12)->nullable();
            $table->string('jab_created_by', 50)->nullable();
            $table->dateTime('jab_created_date')->nullable();
            $table->string('jab_modif_by', 50)->nullable();
            $table->dateTime('jab_modif_date')->nullable();
            $table->smallInteger('jab_order')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ess_msjabatan');
    }
};
