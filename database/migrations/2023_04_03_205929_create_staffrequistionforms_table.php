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
        Schema::create('staff_requistion_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('job_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('department_id')->constrained()->cascadeOnDelete();
            $table->string('jobtitle');
            $table->string('approvedsalary');
            $table->string('reportingto');
            $table->string('numberofvacancies');
            $table->string('noofcurrentholders');
            $table->string('statusofemployment');
            $table->string('startdate');
            $table->boolean('advertise');
            $table->string('advertjustification')->nullable();
            $table->text('jobpurpose');
            $table->text('accountability');
            $table->string('educationalqualifications');
            $table->string('experience');
            $table->string('personalqualities');
            $table->string('other')->nullable();
            $table->string('skill')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_requistion_forms');
    }
};
