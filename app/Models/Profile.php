<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'user_id',
    'full_name',
    'avatar_path',
    'specialty',
    'about',
    'phone_number',
    'availability_status',
    'job_title',
    'years_of_experience',
    'joined_at',
])]
#[Hidden([])]
class Profile extends Model
{
    public $timestamps = false;
    public function user():BelongsTo{
    return $this->BelongsTo(User::class);
    }

    protected function casts(): array{
        return [
            'joined_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
    }

}
