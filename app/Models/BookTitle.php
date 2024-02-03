<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTitle extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucwords($value)
        );
    }
    protected function cover(): Attribute
    {
        return Attribute::make(
            get: function (string $value) {
                return asset('/storage/book_covers') . '/' . $value;
            }
        );
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
    public function availableBooks()
    {
        return $this->hasMany(Book::class)->where('status', 'tersedia');
    }

    public function jumlah()
    {
        return $this->books->count();
    }
    public function jumlahTersedia()
    {
        return $this->availableBooks()->count();
    }
}
