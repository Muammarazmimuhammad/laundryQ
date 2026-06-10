<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaundrySlot extends Model
{
    use HasFactory;

    // Beritahu Laravel bahwa tabel ini TIDAK punya kolom updated_at
    public const UPDATED_AT = null;

    // (Opsional jika sebelumnya belum ada)
    protected $fillable = ['available_date', 'time_slot', 'max_quota', 'current_quota'];
}