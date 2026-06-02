<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SlotAbu extends Model
{
    protected $table = 'slot_abu';
    protected $primaryKey = 'slot_id';

    const CREATED_AT = 'slot_created_at';
    const UPDATED_AT = 'slot_update_at';

    protected $fillable = [
        'admin_id',
        'slot_blok',
        'slot_dinding',
        'slot_name',
        // 'slot_level',
        'slot_status',
        'claim_code',
        'slot_price',
    ];

    public function admin() {
    return $this->belongsTo(Admin::class, 'admin_id');
    }

    protected static function boot()
    {
        parent::boot();

        // Event ini otomatis berjalan setiap kali data SlotAbu disimpan/di-update
        static::saving(function ($slot) {
            if ($slot->slot_status === 'Telah Diambil') {
                if (empty($slot->claim_code)) {
                    $slot->claim_code = strtoupper(Str::random(6)); // Generate kode otomatis
                }
            } elseif ($slot->slot_status === 'Tersedia') {
                $slot->claim_code = null; // Hapus kode jika dibalikkan jadi tersedia
            }
        });
    }
}