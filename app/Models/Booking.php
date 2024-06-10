<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $fillable = [
       'travel_id', 'customer_id', 'email', 'email', 'seat', 'booking_uniqid', 'kode_perjalanan'
        
    ];
}
