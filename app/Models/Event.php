<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\EventType;
use App\Models\Payment;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'date', 'description', 'user_id', 'event_type_id', 'price'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}