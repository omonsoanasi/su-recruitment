<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationLongList extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'applicant_id',
        'application_id',
        'staff_requistion_forms_id',
        'comment',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function staffRequistionForm(): BelongsTo
    {
        return $this->belongsTo(StaffRequistionForm::class, 'staff_requistion_forms_id', 'id');
    }
    public function applicantBasicInfo(): BelongsTo
    {
        return $this->belongsTo(CandidateBasicInfo::class, 'applicant_id', 'user_id');
    }
}
