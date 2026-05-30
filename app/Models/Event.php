<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'event_id';

    const CREATED_AT = 'event_created_at';
    const UPDATED_AT = 'event_update_at';

    protected $fillable = [
        'admin_id',
        'event_name',
        'event_date',
        'event_time',
        'event_status',
        'event_counter',
        'event_description'
    ];
}
