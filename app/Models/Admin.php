<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin'; 
    protected $primaryKey = 'admin_id';
    public $timestamps = false; 

    protected $fillable = [
        'admin_name',
        'admin_password',
    ];

    protected $hidden = [
        'admin_password',
    ];
    
    public function getAuthPassword()
    {
        return $this->admin_password;
    }
}
