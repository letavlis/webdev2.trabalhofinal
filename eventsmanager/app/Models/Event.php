<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function users() {
        return $this->belongsToMany('\App\Models\User', 'event_planners');
    }

    public function usersatt() {
        return $this->belongsToMany('\App\Models\User', 'attendees');
    }

}
