<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sso_msrole', function (Blueprint $table) {
            $table->char('rol_id', 5)->primary();
            $table->string('rol_deskripsi', 50)->nullable();
            $table->string('rol_status', 15)->nullable();
            $table->string('rol_created_by', 50)->nullable();
            $table->dateTime('rol_created_date')->nullable();
            $table->string('rol_modif_by', 50)->nullable();
            $table->dateTime('rol_modif_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sso_msrole');
    }
};
