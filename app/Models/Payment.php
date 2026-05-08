<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = ['id'];

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }

    // Verifikatornya adalah User (Admin)
    public function verifier() {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
