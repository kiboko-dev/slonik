<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Connection extends Model
{
    use SoftDeletes;
    use HasUuids;

    protected $table = 'connections';

    protected $fillable = [
        'last_connection',
        'threads_count',
        'thread_resolution',
        'thread_framerate',
        'highlight_active_tread',
        'highlight_mouse_pointer_area'
    ];

    protected $casts = [
        'last_connection' => 'datetime',
    ];
}
