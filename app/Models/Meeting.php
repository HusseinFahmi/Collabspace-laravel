<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'project_id',
    'title',
    'description',
    'start_at',
    'end_at',
    'meeting_url',
    'recording_url',
    'ai_summary',
    'created_by',
])]
#[Hidden([])]
class Meeting extends Model
{
    //
}
