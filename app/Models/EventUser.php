<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EventUser extends Pivot
{
    protected $table = 'event_user';

    protected $fillable = [
        'user_id',
        'event_id',
        'status',
        'justification',
        'justification_status',
    ];
}
