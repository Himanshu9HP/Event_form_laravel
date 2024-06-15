<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCategoricalDataKey extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'data_key',
        'data_type',
        'key_options',
        'status',
        'is_mandatory',
    ];
}
