<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
#[Hidden([])]
class ProjectFile extends Model
{


public function project():BelongsTo{
    return $this->belongsTo(Project::class,);
}

}
