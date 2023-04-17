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
        Schema::create('candidate_work_exps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('jobtitle');
            $table->string('department');
            $table->string('companyname');
            $table->string('country');
            $table->string('specialization');
            $table->string('currentemployer');
            $table->string('fromdate');
            $table->string('todate')->nullable();
            $table->string('currsalary')->nullable();
            $table->string('leavingreason');
            $table->string('achievement');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_work_exps');
    }
};
