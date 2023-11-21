<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Agent;

class Client extends Model
{
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}