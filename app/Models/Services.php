<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Kelas Service
 * 
 * Mewakili layanan yang tersedia dalam aplikasi, termasuk informasi seperti
 * kategori, deskripsi, harga, keuntungan, batas minimal dan maksimal, serta status.
 *
 * @package App\Models
 */
class Services extends Model
{
    use HasFactory;

     /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',      // ID kategori terkait
        'category_name',    // Nama kategori terkait
        'service_name',     // Nama layanan
        'description',      // Deskripsi layanan
        'price',            // Harga layanan
        'profit',           // Keuntungan dari layanan
        'min',              // Jumlah minimal yang diperbolehkan
        'max',              // Jumlah maksimal yang diperbolehkan
        'provider_sid',     // ID penyedia layanan
        'type',             // Jenis layanan
        'status'            // Status layanan (aktif/nonaktif)
    ];
}
