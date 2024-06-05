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
        Schema::table('tbl_companies', function (Blueprint $table) {
            $table->string('email', 50)->after('company');
            $table->string('website')->after('about');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_companies', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('website');
        });
    }
};
