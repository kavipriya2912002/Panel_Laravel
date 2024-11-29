<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    // Optional if table name is not pluralized conventionally
    protected $table = 'seats';

    // Mass-assignable attributes
    protected $fillable = [
        'seat_number',
        'status', // 'booked', 'available', 'reserved'
        'route_id',
    ];

    // Automatically manage timestamps
    public $timestamps = true;

    // Relationships
    public function booking()
    {
        return $this->belongsTo(Booking::class); // Adjust if bookings are managed differently
    }

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'bookings', 'seat_id', 'user_id')
                    ->withPivot('booking_date')
                    ->withTimestamps();
    }

    // Ensure default status is 'available'
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($seat) {
            if (empty($seat->status)) {
                $seat->status = 'available';
            }
        });
    }
}
