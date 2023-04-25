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
        Schema::create('interview_panels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('staff_requistion_form_id')->constrained()->cascadeOnDelete();
            $table->string('panelistname');
            $table->string('panelistemail');
            $table->string('panelistphonenumber');
            $table->string('interviewdate');
            $table->text('interviewnotes');
            $table->string('interviewtime');
            $table->text('interviewlocation');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interview_panels');
    }
};
