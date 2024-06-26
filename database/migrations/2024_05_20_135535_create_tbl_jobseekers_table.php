<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_jobseekers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tbl_user_id')->constrained('tbl_users')->onDelete('cascade');
            $table->foreignId('tbl_job_id')->constrained('tbl_jobs')->onDelete('cascade');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_jobseekers');
    }
};
