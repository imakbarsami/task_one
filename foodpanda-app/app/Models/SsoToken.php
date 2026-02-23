<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SsoToken extends Model
{
    public $fillables = [
        'user_id',
        'token',    
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
