<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'team_id',
    'user_id',
    'position_id',
])]
#[Hidden([])]
class TeamMember extends Model
{
    //
}
