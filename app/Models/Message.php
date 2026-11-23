<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'conversation_id',
    'sender_id',
    'body',
    'type',
    'reply_to_message_id',
    'deleted_at'
])]

class Message extends Model
{
    use SoftDeletes;

    public function conversation(): BelongsTo{
        return $this->belongsTo(Conversation::class);
    }

    public function sender(): BelongsTo{
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function replyTo(): BelongsTo{
        return $this->belongsTo(self::class, 'reply_to_message_id');
    }

    public function replies(): HasMany{
        return $this->hasMany(self::class, 'reply_to_message_id');
    }

    public function attachments(): HasMany{
        return $this->hasMany(MessageAttachment::class);
    }

    public function reads(): HasMany{
        return $this->hasMany(MessageRead::class);
    }

    public function casts(): array{
        return [
            'deleted_at' => 'datetime'
        ];
    }
}
