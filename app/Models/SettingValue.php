<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingValue extends Model
{
    protected $table = 'setting_values';
    protected $fillable = [
        'connection_uuid',
        'key',
        'value'
    ];

    public function setting(): BelongsTo
    {
        return $this->belongsTo(Setting::class, 'key');
    }

    public function connection(): BelongsTo
    {
        return $this->belongsTo(Connection::class, 'connection_uuid');
    }
}
