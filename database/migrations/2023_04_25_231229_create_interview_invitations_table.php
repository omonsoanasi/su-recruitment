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
        Schema::create('interview_invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('application_id')->constrained()->cascadeOnDelete();
            $table->foreignId('applicant_id')->constrained()->cascadeOnDelete()->references('user_id')->on('applications');
            $table->foreignId('staff_requistion_form_id')->constrained()->cascadeOnDelete();
            $table->string('interviewdate');
            $table->string('interviewtime');
            $table->string('interviewlocation');
            $table->string('extrarequirements')->nullable();
            $table->string('comments');
            $table->boolean('candidateresponse')->default(false);
            $table->text('candidatecomment')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interview_invitations');
    }
};
