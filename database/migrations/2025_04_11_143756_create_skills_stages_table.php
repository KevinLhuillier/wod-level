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
        Schema::create('skills_stages', function (Blueprint $table) {
            $table->unsignedBigInteger('skill_id');
            $table->string('skill_name');
            $table->integer('stage');
            $table->string('stage_label');

            $table->primary(['skill_id', 'stage']);
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills_stages');
    }
};
