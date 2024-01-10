<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['book_title_id'];

    public function book_title()
    {
        return $this->belongsTo(BookTitle::class);
    }
}
