<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $guarded = ['id'];

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
