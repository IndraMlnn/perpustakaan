<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'book_id',
        'user_id',
        'borrowed_at',
        'due_at',
        'returned_at',
        'status',
    ];

    // Relasi ke buku
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
