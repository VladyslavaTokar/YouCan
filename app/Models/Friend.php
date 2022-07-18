<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    public function requester(){
        return $this->belongsTo('App\Models\User', 'user_id_requester');
    }

    public function acceptor(){
        return $this->belongsTo('App\Models\User', 'user_id_acceptor');
    }
}
