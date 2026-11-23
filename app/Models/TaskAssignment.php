<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

#[Fillable([
    'task_id',
    'user_id',
    'assigned_by',
    'assigned_at',
])]

class TaskAssignment extends Pivot
{
    public $incrementing = true;
    public $timestamps = false;

    public function task(): BelongsTo{
        return $this->belongsTo(Task::class);
    }

    public function assignee(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assigner(): BelongsTo{
        return $this->belongsTo(User::class, 'assigned_by');
    }
    
    protected function casts(): array{
        return [
            'assigned_at' => 'datetime',
        ];
    }

}