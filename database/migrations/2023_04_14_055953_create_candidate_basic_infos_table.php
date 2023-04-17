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
        Schema::create('candidate_basic_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('idnumber');
            $table->string('email');
            $table->string('gender');
            $table->string('dateofbirth');
            $table->string('disability');
            $table->string('nationality');
            $table->string('countryofresidence');
            $table->string('applicanttype');
            $table->string('maritalstatus');
            $table->string('relatedtostaff');
            $table->string('relationshiptype')->nullable();
            $table->string('nameofstaff')->nullable();
            $table->string('phonenumber');
            $table->string('townofresidence');
            $table->string('postaladdress')->nullable();
            $table->string('city')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('currsalary');
            $table->string('expsalary');
            $table->string('currentbenefits');
            $table->string('referralsource');
            $table->string('othersource')->nullable();
            $table->string('skillscompetence');
            $table->string('strengths');
            $table->string('lawviolation');
            $table->string('violationdesc')->nullable();
            $table->string('exploitation');
            $table->string('exploitationdesc')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_basic_infos');
    }
};
