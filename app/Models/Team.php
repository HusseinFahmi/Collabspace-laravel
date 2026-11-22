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
    'name',
    'description',
])]
#[Hidden([])]
class Team extends Model
{
use HasFactory;


public function project():BelongsTo{
    return $this->belongsTo(Project::class);
}
public function tasks():HasMany{
    return $this->hasMany(Task::class);
}
public function members():BelongsToMany{
    return $this->belongsToMany(User::class , "team_members","team_id","user_id")->withPivot("position_id");
}

}
