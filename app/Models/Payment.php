<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\User;
use App\Models\Ticket;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'amount',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }
}