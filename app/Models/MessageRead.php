<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'message_id',
    'user_id',
    'read_at',
])]
#[Hidden([])]
class MessageRead extends Model
{
    //
}
