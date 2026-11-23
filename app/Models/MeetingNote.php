<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'meeting_id',
    'user_id',
    'content',
])]


class MeetingNote extends Model
{
    public function meeting(): BelongsTo{
        return $this->belongsTo(Meeting::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
