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
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id_task');
            $table->string('task_title', 255)->nullable();
            $table->text('task_description')->nullable();
            $table->date('create_at')->nullable();
            $table->date('update_at')->nullable();
            $table->unsignedInteger('id_status')->nullable();
            $table->foreign('id_status')->references('id_status')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
