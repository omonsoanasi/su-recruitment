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
        Schema::table('candidate_work_exps', function (Blueprint $table) {
            $table->text('specialization')->nullable()->change();
            $table->text('leavingreason')->nullable()->change();
            $table->text('achievement')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidate_work_exps', function (Blueprint $table) {
            //
        });
    }
};
