<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $table = 'donation';
    protected $primaryKey = 'donation_id';

    const CREATED_AT = 'donation_created_at';
    const UPDATED_AT = 'donation_update_at';

    protected $fillable = [
        'admin_id',
        'donation_name',
        'donation_description',
        'donation_target',
        'donation_progress',
    ];
}
