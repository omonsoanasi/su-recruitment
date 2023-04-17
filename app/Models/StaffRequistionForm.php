<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffRequistionForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'job_type_id',
        'department_id',
        'campus_location_id',
        'jobtitle',
        'approvedsalary',
        'reportingto',
        'numberofvacancies',
        'noofcurrentholders',
        'statusofemployment',
        'startdate',
        'advertise',
        'advertjustification',
        'jobpurpose',
        'accountability',
        'educationalqualifications',
        'experience',
        'personalqualities',
        'other',
        'skill',
    ];

    public function jobType(): BelongsTo
    {
        return $this->belongsTo(JobType::class);
    }

    public function campusLocation(): BelongsTo
    {
        return $this->belongsTo(CampusLocation::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function bPartnerComment(): HasOne
    {
        return $this->hasOne(BusinessPartnerComment::class);
    }
}
