<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'stock',
        'description',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
