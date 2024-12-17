<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbKaryawan', function (Blueprint $table) {
            $table->string('username')->primary(); // PK
            $table->string('npk')->unique();
            $table->string('namaKaryawan');
            $table->string('createdBy')->nullable();
            $table->timestamp('createDate')->useCurrent();
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('tbKaryawan');
    }
};
