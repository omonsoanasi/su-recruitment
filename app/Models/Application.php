<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'staff_requistion_form_id',
        'coverletter'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function staffRequistionForm(): BelongsTo
    {
        return $this->belongsTo(StaffRequistionForm::class);
    }

    public function basicinfo(): BelongsTo
    {
        return $this->belongsTo(CandidateBasicInfo::class, 'user_id', 'user_id');
    }

    public function academicinfo(): HasMany
    {
        return $this->hasMany(CandidateAcademicBackground::class, 'user_id', 'user_id');
    }

    public function workexperience(): HasMany
    {
        return $this->hasMany(CandidateWorkExp::class, 'user_id', 'user_id');
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(CandidateAttachment::class, 'user_id', 'user_id');
    }

    public function declaration(): BelongsTo
    {
        return $this->belongsTo(CandidateDeclaration::class, 'user_id', 'user_id');
    }

    public function longliststatus(): BelongsTo
    {
        return $this->belongsTo(ApplicationLongList::class, 'user_id', 'applicant_id');
    }

}
