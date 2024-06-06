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
        Schema::table('tbl_jobseekers', function (Blueprint $table) {
            $table->boolean('status')->default(0)->after('tbl_job_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_jobseekers', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
