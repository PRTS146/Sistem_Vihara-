<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'event_id';

    protected $fillable = [
        'event_name',
        'event_description',
        'event_date',
        'event_time',
        'event_status', 
        'event_counter'
    ];

    protected $casts = [
        'event_date' => 'date',
        'event_counter' => 'integer',
    ];

    public function getDynamicStatusAttribute()
    {
        $eventDateTime = Carbon::parse($this->event_date->format('Y-m-d') . ' ' . $this->event_time);
        
        if ($eventDateTime->isPast()) {
            return 'Selesai'; 
        } elseif ($eventDateTime->isToday()) {
            return 'Sedang Berlangsung'; 
        } else {
            return 'Akan Datang'; 
        }
    }

    public function scopeActive($query)
    {
        return $query->whereDate('event_date', '>=', now()->toDateString())
                     ->orderBy('event_date', 'asc'); 
    }
}