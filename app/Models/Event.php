<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $primaryKey = 'event_id';

    const CREATED_AT = 'event_created_at';
    const UPDATED_AT = 'event_update_at';

    protected $fillable = [
        'admin_id',
        'event_name',
        'event_date',
        'event_description',
        'event_image',
        'show_in_carousel',
    ];

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class, 'event_id', 'event_id');
    }

    public function registeredUsers()
    {
        return $this->belongsToMany(User::class, 'event_registrations', 'event_id', 'user_id');
    }
}

