<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'meeting_id',
    'speaker_id',
    'speaker_name',
    'offset_seconds',
    'language',
    'content',
])]
#[Hidden([])]
class MeetingTranscript extends Model
{
    //
}
