<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateAttachment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'application_attachment_id',
        'attachmentdoc',
    ];

    public function applicationattachment(): BelongsTo
    {
        return $this->belongsTo(ApplicationAttachment::class, 'application_attachment_id', 'id');
    }

}
