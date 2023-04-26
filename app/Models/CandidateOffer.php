<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateOffer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'applicant_id',
        'application_id',
        'staff_requistion_form_id',
        'comments',
        'interviewdate',
        'interviewtime',
        'offered',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function staffRequistionForm(): BelongsTo
    {
        return $this->belongsTo(StaffRequistionForm::class);
    }
    public function applicantBasicInfo(): BelongsTo
    {
        return $this->belongsTo(CandidateBasicInfo::class, 'applicant_id', 'user_id');
    }
}
