<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'meeting_id',
    'user_id',
    'content',
])]
#[Hidden([])]
class MeetingNote extends Model
{
    //
}
