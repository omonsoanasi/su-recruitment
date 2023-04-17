<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateAcademicBackground extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
              'user_id',
              'qualification_type_id',
              'qualificationtitle',
              'specializationarea',
              'institutionname',
              'fromdate',
              'todate',
              'academiccert'
            ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function qualificationtype(): BelongsTo
    {
        return $this->belongsTo(QualificationType::class, 'qualification_type_id', 'id');
    }

}
