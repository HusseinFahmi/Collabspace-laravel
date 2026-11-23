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

#[Fillable(['email', 'password', 'remember_token', 'deleted_at'])]
#[Hidden(['password', 'remember_token'])]

class User extends Model
{
    use HasFactory, Notifiable;

    public function meetingsg(): HasMany{
        return $this->hasMany(Meeting::class);
    }

    public function createdMeetings(): HasMany{
        return $this->hasMany(Meeting::class, 'created_by');
    }

    public function meetingComments(): HasMany{
        return $this->hasMany(MeetingComment::class);
    }

    public function meetingNotes(): HasMany{
        return $this->hasMany(MeetingNote::class);
    }

    public function meetingParticipations(): HasMany{
        return $this->hasMany(MeetingParticipant::class);
    }

    public function spokenTranscripts(): HasMany{
        return $this->hasMany(MeetingTranscript::class, 'speaker_id');
    }

    public function sentMessages(): HasMany{
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function messageReads(): HasMany{
        return $this->hasMany(MessageRead::class);
    }

    public function profile(): HasOne{
        return $this->HasOne(Profile::class);
    }

    public function createdProjects(): HasMany{
        return $this->hasMany(Project::class, 'created_by');
    }

    public function projects(): BelongsToMany{
        return $this->belongsToMany(
            Project::class,
            'project_members', 
            'user_id', 
            'project_id'
        )->withPivot(['role', 'assigned_at']);
    }

    public function uploadedProjectFiles(): HasMany{
        return $this->hasMany(ProjectFile::class, 'upload_by');
    }

    public function createdTasks(): HasMany{
        return $this->hasMany(Task::class, 'created_by');
    }

    public function reviewTasks(): HasMany{
        return $this->hasMany(Task::class, 'reviewer_id');
    }

    public function assignedTasks(): BelongsToMany{
        return $this->belongsToMany(
            Task::class,
            'task_assignments',
            'user_id',
            'task_id'
        )->withPivot(['id', 'assigned_by', 'assigned_at']);
    }

    public function givenTaskAssignments(): HasMany{
        return $this->hasMany(TaskAssignment::class, 'assigned_by');
    }

    public function taskComments(): HasMany{
        return $this->hasMany(TaskComment::class);
    }

    public function teams(): BelongsToMany{
        return $this->belongsToMany(
            Team::class, 
            "team_members", 
            "user_id", 
            "team_id"
        )->withPivot("position_id")
         ->withTimestamps();
    }

    public function createdConversations(): HasMany{
        return $this->hasMany(Conversation::class, 'created_by');
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

    protected function casts(): array{
        return [
            'password' => 'hashed',
        ];
    }
}
