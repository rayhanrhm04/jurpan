<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'return_url' ,
        'signature' ,
        'type_payment' ,
        'method_name' ,
        'payment',
        'amount',
        'status',
    ];

    
}
