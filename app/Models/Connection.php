<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;
    // Recive Request
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requestToUser()
    {
        return $this->belongsTo(User::class,'requested_to');
    }

    public function requestFromUser()
    {
        return $this->belongsTo(User::class,'requested_from');
    }
    // Send Request
    public function sendrequest()
    {
        return $this->belongsTo(User::class,'requested_from','user_id');
    }
}
