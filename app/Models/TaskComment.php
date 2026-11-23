<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'task_id',
    'user_id',
    'comment',
    'created_at'
])]

class TaskComment extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function task(): BelongsTo{
        return $this->belongsTo(Task::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    
    protected function casts(): array{
        return [
            'created_at' => 'datetime',
        ];
    }

}
