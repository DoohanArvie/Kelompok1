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
        Schema::create('tbl_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job', 50);
            $table->string('slug', 50);
            $table->string('lokasi', 100);
            $table->foreignId('tbl_category_id')->constrained()->onDelete('cascade');
            $table->foreignId('tbl_company_id')->constrained()->onDelete('cascade');
            $table->boolean('is_open');
            $table->longText('description');
            $table->text('requirement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_jobs');
    }
};