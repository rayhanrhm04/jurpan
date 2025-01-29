<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id', 'admin_reply', 'user_reply',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
