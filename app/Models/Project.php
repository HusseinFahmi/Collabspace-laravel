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
    'project_name',
    'description',
    'start_date',
    'deadline',
    'status',
    'priority',
    'project_type',
    'created_by',
])]
#[Hidden([])]
class Project extends Model
{
use HasFactory;

public function files():HasMany{
    return $this->hasMany(ProjectFile::class);
}
public function teams():HasMany{
    return $this->hasMany(Team::class);
}
public function creator():BelongsTo{
    return $this->belongsTo(User::class,"created_by");
}
public function tasks():HasMany{
    return $this->hasMany(Task::class);
}
public function members():BelongsToMany{
    return $this->belongsToMany(User::class , "project_members","project_id","user_id");
}
protected function casts(): array
{
    return [
        'start_date' => 'date',
        'deadline' => 'date',
    ];
}
}
