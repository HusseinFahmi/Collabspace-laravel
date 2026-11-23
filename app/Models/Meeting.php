<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

class Meeting extends Model
{
    public function project(): BelongsTo{
        return $this->belongsTo(Project::class);
    }

    public function creator(): BelongsTo{
        return $this->belongsTo(User::class, 'created_by');
    }

    public function comments(): HasMany{
        return $this->hasMany(Meeting::class);
    }

    public function notes(): HasMany{
        return $this->hasMany(MeetingNote::class);
    }

    public function participants(): HasMany{
        return $this->hasMany(MeetingParticipant::class);
    }

    public function transcripts(): HasMany{
        return $this->hasMany(MeetingTranscript::class)->orderBy('offset_seconds');
    }

    public function casts(): array{
        return [
            'start_at' => 'datetime',
            'end_at' => 'datetime'
        ];
    }
}
