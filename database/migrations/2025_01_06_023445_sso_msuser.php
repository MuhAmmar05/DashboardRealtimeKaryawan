<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sso_msuser', function (Blueprint $table) {
            $table->string('usr_id', 50);
            $table->char('rol_id', 5);
            $table->char('app_id', 5);
            $table->string('usr_password', 50);
            $table->string('usr_status', 50)->nullable();
            $table->string('usr_created_by', 50)->nullable();
            $table->dateTime('usr_created_date')->nullable();
            $table->string('usr_modif_by', 50)->nullable();
            $table->dateTime('usr_modif_date')->nullable();

            // Composite primary key
            $table->primary(['usr_id', 'rol_id', 'app_id']);

            // Foreign key constraints
            $table->foreign('rol_id')->references('rol_id')->on('sso_msrole')->onDelete('cascade');
            $table->foreign('app_id')->references('app_id')->on('sso_msaplikasi')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sso_msuser');
    }
};
