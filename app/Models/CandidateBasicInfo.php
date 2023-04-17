<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateBasicInfo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'lastname',
        'firstname',
        'middlename',
        'idnumber',
        'email',
        'gender',
        'dateofbirth',
        'disability',
        'nationality',
        'countryofresidence',
        'applicanttype',
        'maritalstatus',
        'relatedtostaff',
        'relationshiptype',
        'nameofstaff',
        'phonenumber',
        'townofresidence',
        'postaladdress',
        'city',
        'postalcode',
        'currsalary',
        'expsalary',
        'currentbenefits',
        'referralsource',
        'othersource',
        'skillscompetence',
        'strengths',
        'lawviolation',
        'violationdesc',
        'exploitation',
        'exploitationdesc'
    ];

    public function referralsource(): BelongsTo
    {
        return $this->belongsTo(ReferralSource::class);
    }
}
