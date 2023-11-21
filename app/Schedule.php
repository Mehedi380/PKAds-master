<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Client;

class Schedule extends Model
{
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}