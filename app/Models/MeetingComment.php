<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'meeting_id',
    'user_id',
    'comment',
    'created_at'
])]

class MeetingComment extends Model
{
    public $timestamps = false;

    public function meeting(): BelongsTo{
        return $this->belongsTo(Meeting::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function casts(): array{
        return [
            'created_at' => 'datetime'
        ];
    }
}
