<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{

    protected $table = 'settings';

    protected $fillable = [
        'key',
        'name',
        'default_value'
    ];

    public function values(): HasMany
    {
        return $this->hasMany(SettingValue::class);
    }
}
