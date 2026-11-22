<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'user_id',
    'project_id',
    'team_id',
    'role',
])]
#[Hidden([])]
class ProjectMember extends Model
{
    //
}
