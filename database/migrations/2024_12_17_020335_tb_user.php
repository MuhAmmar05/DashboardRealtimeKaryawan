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
        Schema::create('tbUser', function (Blueprint $table) {
            $table->increments('idUser');
            $table->string('username');
            $table->string('password');
            $table->unsignedInteger('idRole'); // Foreign Key
            $table->string('createdBy')->nullable();
            $table->timestamp('createDate')->useCurrent();
            $table->integer('status');

            $table->foreign('idRole')->references('idRole')->on('tbRole')->onDelete('cascade');
            $table->foreign('username')->references('username')->on('tbKaryawan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('tbUser');
    }
};
