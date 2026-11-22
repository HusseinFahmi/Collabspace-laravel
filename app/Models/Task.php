<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'project_id',
    'team_id',
    'reviewer_id',
    'title',
    'description',
    'status',
    'priority',
    'progress',
    'due_date',
    'created_by',
])]
#[Hidden([])]
class Task extends Model
{
    use HasFactory;

    public function project():BelongsTo{
        return $this->belongsTo(Project::class);
    }
    public function team():BelongsTo{
        return $this->belongsTo(Team::class);
    }
    public function reviewer(): BelongsTo
{
    return $this->belongsTo(User::class, 'reviewer_id');
}
public function comments ():HasMany{
    return $this->hasMany(TaskComment::class,"task_id");
}
public function creator(): BelongsTo
{
    return $this->belongsTo(User::class, 'created_by');
}
public function assignees(): BelongsToMany
{
    return $this->belongsToMany(
        User::class,
        'task_assignments',
        'task_id',
        'user_id'
    )->withPivot(['assigned_by', 'assigned_at']);
}
}
