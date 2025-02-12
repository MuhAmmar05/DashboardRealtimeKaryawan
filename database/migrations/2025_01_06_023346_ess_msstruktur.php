<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ess_msstruktur', function (Blueprint $table) {
            $table->id('str_id'); // Auto Increstrt
            $table->string('str_desc', 100)->nullable();
            $table->unsignedBigInteger('str_parent_id')->nullable();
            $table->string('str_status', 15)->nullable();
            $table->string('str_created_by', 50)->nullable();
            $table->dateTime('str_created_date')->nullable();
            $table->string('str_modif_by', 50)->nullable();
            $table->dateTime('str_modif_date')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ess_msstruktur');
    }
};
