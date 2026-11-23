<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'project_id',
    'upload_by',
    'name',
    'file_path',
    'mime_type',
    'extension',
    'file_size',
    'uploaded_at',
])]

class ProjectFile extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    public function project(): BelongsTo{
        return $this->belongsTo(Project::class,);
    }

    public function uploader(): BelongsTo{
        return $this->belongsTo(User::class, 'upload_by');
    }

    protected function casts(): array{
        return [
            'file_size'   => 'integer',
            'uploaded_at' => 'datetime',
            'deleted_at'  => 'datetime',
            'updated_at'  => 'datetime',
        ];
    }
}
