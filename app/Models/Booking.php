<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['book_id','user_id','borrowed_at','due_at','returned_at','status'];
    protected $casts = [
        'borrowed_at'=>'date',
        'due_at'=>'date',
        'returned_at'=>'date',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }       

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
