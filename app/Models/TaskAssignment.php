<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'task_id',
    'user_id',
    'assigned_by',
    'assigned_at',
])]
#[Hidden([])]
class TaskAssignment extends Model
{
    
}
