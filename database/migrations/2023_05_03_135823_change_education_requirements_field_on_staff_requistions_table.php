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
        Schema::table('staff_requistion_forms', function (Blueprint $table) {
            $table->text('advertjustification')->nullable()->change();
            $table->text('educationalqualifications')->change();
            $table->text('experience')->change();
            $table->text('personalqualities')->change();
            $table->text('other')->nullable()->change();
            $table->text('skill')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff_requistion_forms', function (Blueprint $table) {
            //
        });
    }
};
