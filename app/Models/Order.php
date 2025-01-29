<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Kelas Order
 * 
 * Mewakili pesanan yang dibuat oleh pengguna untuk layanan dan kategori tertentu,
 * termasuk detail terkait seperti harga, jumlah, status, dll.
 *
 * @package App\Models
 */
class Order extends Model
{
    use HasFactory;

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'service_id',
        'category_id',
        'min_amount',
        'max_amount',
        'price',
        'target',
        'quantity',
        'amount',
        'status',
        'description',
    ];

    /**
     * Mendapatkan kategori yang dimiliki oleh pesanan ini.
     *
     * Fungsi ini membuat relasi "belongsTo" ke model Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(categories::class, 'category_id', 'id');
    }

    /**
     * Mendapatkan layanan yang terkait dengan pesanan ini.
     *
     * Fungsi ini membuat relasi "belongsTo" ke model Service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Services::class, 'service_id', 'id');
    }
}
