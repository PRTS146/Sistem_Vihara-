<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlotAbu extends Model
{
    protected $table = 'slot_abu';
    protected $primaryKey = 'slot_id';

    const CREATED_AT = 'slot_created_at';
    const UPDATED_AT = 'slot_update_at';

    protected $fillable = [
        'admin_id',
        'slot_name',
        'slot_level',
        'slot_status',
        'slot_price',
    ];

    public function admin() {
    return $this->belongsTo(Admin::class, 'admin_id');
    }
}