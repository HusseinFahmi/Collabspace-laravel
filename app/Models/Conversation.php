<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'type',
    'name',
    'project_id',
    'team_id',
    'created_by',
])]
#[Hidden([])]
class Conversation extends Model
{
    //
}
