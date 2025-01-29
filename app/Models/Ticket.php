<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
     // Mendefinisikan atribut yang dapat diisi untuk mass assignment
    protected $fillable = [
        'subject',
        'type',
        'content',
        'status',
        'user_id',
    ];

    public function getStatusClassAttribute()
    {
        return match ($this->status) {
            'open' => 'warning',
            'closed' => 'danger',
            'answered' => 'success',
            'user-reply' => 'info',
            default => 'secondary',
        };
    }

    public function responses()
    {
        return $this->hasMany(TicketResponse::class);
    }
}
