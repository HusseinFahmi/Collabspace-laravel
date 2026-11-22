<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'task_id',
    'user_id',
    'comment',
])]
#[Hidden([])]
class TaskComment extends Model
{
    public $timestamps = false;
public function task(): BelongsTo
{
    return $this->belongsTo(Task::class, 'task_id');
}
public function user(): BelongsTo
{
    return $this->belongsTo(User::class, 'user_id');
}
}
