<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'category_name',
        'service_name',
        'description',
        'price',
        'profit',
        'min',
        'max',
        'provider_sid',
        'type',
        'status'
    ];
}
