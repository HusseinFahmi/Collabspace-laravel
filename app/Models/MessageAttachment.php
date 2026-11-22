<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'message_id',
    'file_name',
    'file_path',
    'mime_type',
    'file_size',
])]
#[Hidden([])]
class MessageAttachment extends Model
{
    //
}
