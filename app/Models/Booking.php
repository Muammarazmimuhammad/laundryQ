<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings'; 

    protected $fillable = [
        'booking_code', 
        'user_id', 
        'service_id', 
        'slot_id', 
        'weight', 
        'total_price', 
        'status', 
        'notes',
        'weight',        
        'total_price',   
    ];

    // Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel LaundrySlot
    public function slot()
    {
        return $this->belongsTo(LaundrySlot::class, 'slot_id');
    }

    // Tambahkan Relasi ke tabel Service ini!
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    // Relasi ke tabel TrackingLog
    public function trackingLogs()
    {
        // 1 pesanan (booking) bisa punya banyak riwayat pelacakan (tracking logs)
        return $this->hasMany(TrackingLog::class, 'booking_id');
    }
}