<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'meeting_id',
    'speaker_id',
    'speaker_name',
    'offset_seconds',
    'language',
    'content',
])]

class MeetingTranscript extends Model
{
    public $timestamps = false;

    public function meeting(): BelongsTo{
        return $this->belongsTo(Meeting::class);
    }

    public function speaker(): BelongsTo{
        return $this->belongsTo(User::class, 'speaker_id');
    }

    protected function casts(): array{
        return [
            'offset_seconds' => 'integer'
        ];
    }
}
