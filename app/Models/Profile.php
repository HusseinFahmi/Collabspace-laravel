<?php

namespace App\Models;

use Illuminate\Console\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'full_name', 'avatar_path', 'joined_at', 'specialty', 'about', 'phone_number' ])]
#[Hidden(['password', 'remember_token'])]
class Profile extends Model
{
    public $timestamps = false;

    protected function casts(): array{
        return [
            'joined_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
    }

}
