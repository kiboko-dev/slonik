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
        'license',
        'ip'
    ];

    public function license(): BelongsTo
    {
        return $this->belongsTo(License::class);
    }
}
