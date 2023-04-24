<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HoDFeedback extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'applicant_id',
        'application_id',
        'staff_requistion_form_id',
        'comment'
    ];
}
