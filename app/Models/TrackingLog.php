<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingLog extends Model
{
    use HasFactory;

    // Matikan pencarian otomatis untuk created_at dan updated_at
    public $timestamps = false;

    // Daftarkan kolom yang boleh diisi
    protected $fillable = ['booking_id', 'status', 'description'];
    protected $guarded = [];
}