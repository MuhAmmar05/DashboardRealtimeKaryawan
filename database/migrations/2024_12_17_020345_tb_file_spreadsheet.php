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
        Schema::create('tbFileSpreadsheet', function (Blueprint $table) {
            $table->increments('idSpreadsheet'); // Primary Key Auto Increment
            $table->string('namaFile');
            $table->unsignedInteger('createdBy');
            $table->timestamp('createDate')->useCurrent();
            $table->integer('status');
            $table->foreign('createdBy')->references('idUser')->on('tbUser')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('tbFileSpreadsheet');
    }
};
