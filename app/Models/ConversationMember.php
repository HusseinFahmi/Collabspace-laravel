<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'conversation_id',
    'user_id',
    'role',
    'joined_at',
    'last_read_message_id',
    'muted_at',
    'archived_at',
])]
#[Hidden([])]
class ConversationMember extends Model
{
    //
}
