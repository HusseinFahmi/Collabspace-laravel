<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

#[Fillable(['email', 'password'])]
#[Hidden(['password', 'remember_token'])]

class User extends Model
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    public function profile(): HasOne
    {
        return $this->HasOne(Profile::class);
    }
    public function createProject(): HasMany
    {
        return $this->hasMany(Project::class, "created_by");
    }
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, "project_members", "user_id", "project_id")->withPivot("role");
    }
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, "team_members", "user_id", "team_id")->withPivot("position_id");
    }
    public function tasksToReview(): HasMany
    {
        return $this->hasMany(Task::class, 'reviewer_id');
    }
    public function createdTasks(): HasMany
{
    return $this->hasMany(Task::class, 'created_by');
}
public function taskComments(): HasMany
{
    return $this->hasMany(TaskComment::class, 'user_id');
}
public function uploadedFiles(): HasMany
{
    return $this->hasMany(ProjectFile::class, 'upload_by');
}
    public function assignedTasks(): BelongsToMany
    {
        return $this->belongsToMany(
            Task::class,
            'task_assignments',
            'user_id',
            'task_id'
        )->withPivot(['assigned_by', 'assigned_at']);
    }
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
