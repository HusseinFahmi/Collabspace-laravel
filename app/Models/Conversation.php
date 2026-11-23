<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'type',
    'name',
    'project_id',
    'team_id',
    'created_by',
])]

class Conversation extends Model
{
    public function project(): BelongsTo{
        return $this->belongsTo(Project::class);
    }

    public function team(): BelongsTo{
        return $this->belongsTo(Team::class);
    }

    public function creator(): BelongsTo{
        return $this->belongsTo(User::class, 'created_by');
    }

    public function messages(): HasMany{
        return $this->hasMany(Message::class);
    }

    public function users(): BelongsToMany{
        return $this->belongsToMany(
            User::class, 
            'conversation_members', 
            'conversation_id', 
            'user_id'
        )->withPivot(['role', 'joined_at', 'last_read_message_id', 'muted_at', 'archived_at'])
         ->withCasts([
            'joined_at'   => 'datetime',
            'muted_at'    => 'datetime',
            'archived_at' => 'datetime',
        ]);
    }
}
