<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class License extends Model
{
    use SoftDeletes, HasUuids;

    protected $table = 'licenses';

    protected $fillable = [
        'client_name',
        'connections'
    ];

    public function connections(): HasMany
    {
        return $this->hasMany(Connection::class);
    }
}
