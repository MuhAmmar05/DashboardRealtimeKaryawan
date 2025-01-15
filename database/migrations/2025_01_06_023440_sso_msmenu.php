<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sso_msmenu', function (Blueprint $table) {
            $table->id('men_id'); // Auto Increment
            $table->char('app_id', 5)->nullable();
            $table->char('rol_id', 5)->nullable();
            $table->string('men_nama', 100)->nullable();
            $table->string('men_link', 100)->nullable();
            $table->string('men_status', 15)->nullable();
            $table->string('men_created_by', 50)->nullable();
            $table->dateTime('men_created_date')->nullable();
            $table->string('men_modif_by', 50)->nullable();
            $table->dateTime('men_modif_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sso_msmenu');
    }
};
