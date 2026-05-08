<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function slot() {
        return $this->belongsTo(Slot::class);
    }

    public function payment() {
        return $this->hasOne(Payment::class);
    }
}
