<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Schedule;

class DSR extends Model
{
    protected $table = 'dsrs';

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}