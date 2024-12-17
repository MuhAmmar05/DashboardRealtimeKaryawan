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
        Schema::create('tbKehadiran', function (Blueprint $table) {
            $table->increments('idKehadiran');
            $table->string('username'); // Foreign Key
            $table->timestamp('logMasuk')->nullable();
            $table->timestamp('logKeluar')->nullable();
            $table->integer('statusKehadiran')->nullable();
            $table->string('keteranganKehadiran')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamp('createDate')->useCurrent();

            $table->foreign('username')->references('username')->on('tbKaryawan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('tbKehadiran');
    }
};
