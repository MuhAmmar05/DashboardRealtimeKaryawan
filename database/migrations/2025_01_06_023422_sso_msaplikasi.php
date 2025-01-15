<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sso_msaplikasi', function (Blueprint $table) {
            $table->char('app_id', 5)->primary();
            $table->string('app_deskripsi', 100)->nullable();
            $table->string('app_status', 15)->nullable();
            $table->string('app_created_by', 50)->nullable();
            $table->dateTime('app_created_date')->nullable();
            $table->string('app_modif_by', 50)->nullable();
            $table->dateTime('app_modif_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sso_msaplikasi');
    }
};
