<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjamans';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    protected function status(): Attribute
    {
        return Attribute::make(
            get: function (int $value) {
                switch ($value) {
                    case 0:
                        return 'Belum diambil';
                        break;
                    case 1:
                        return 'Sedang dipinjam';
                        break;

                    default:
                        # code...
                        break;
                }
            }
        );
    }
}
