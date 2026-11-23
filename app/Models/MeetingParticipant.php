<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'meeting_id',
    'user_id',
    'invite_status',
    'joined_at',
])]

class MeetingParticipant extends Model
{

    public function meeting(): BelongsTo{
        return $this->belongsTo(Meeting::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    
    public function casts(): array{
        return [
            'joined_at' => 'datetime',
        ];
    }
}
