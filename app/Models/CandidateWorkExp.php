<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateWorkExp extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'jobtitle',
        'department',
        'companyname',
        'country',
        'specialization',
        'currentemployer',
        'fromdate',
        'todate',
        'currsalary',
        'leavingreason',
        'achievement',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
