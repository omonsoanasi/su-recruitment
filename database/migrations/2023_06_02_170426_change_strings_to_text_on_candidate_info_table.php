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
        Schema::table('candidate_basic_infos', function (Blueprint $table) {
            $table->text('skillscompetence')->nullable()->change();
            $table->text('strengths')->nullable()->change();
            $table->text('violationdesc')->nullable()->change();
            $table->text('exploitationdesc')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidate_basic_infos', function (Blueprint $table) {
            //
        });
    }
};
