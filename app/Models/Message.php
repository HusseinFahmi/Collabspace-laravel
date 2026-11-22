<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'conversation_id',
    'sender_id',
    'body',
    'type',
    'reply_to_message_id',
])]
#[Hidden([])]
class Message extends Model
{
    //
}
