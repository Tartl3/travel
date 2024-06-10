<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class traveloko extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode_perjalanan',
        'kendaraan',
        'asal',
        'tujuan',
        'tgl',
        'waktu',
        'harga',
        'max_capacity',
        'status',
        'customer_id',
        'name',
        'number',
        'email',
        
    ];

   

}
