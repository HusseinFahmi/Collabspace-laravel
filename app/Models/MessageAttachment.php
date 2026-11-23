<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'message_id',
    'file_name',
    'file_path',
    'mime_type',
    'file_size',
    'created_at'
])]

class MessageAttachment extends Model
{
    public $timestamps = false;

    public function message(): BelongsTo{
        return $this->belongsTo(Message::class);
    }

    protected function casts(): array{
        return [
            'file_size'  => 'integer',
            'created_at' => 'datetime',
        ];
    }
}
