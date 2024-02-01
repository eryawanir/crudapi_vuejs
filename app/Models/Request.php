<?php

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function book_title()
    {
        return $this->belongsTo(BookTitle::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected function status(): Attribute
    {
        return Attribute::make(
            get: function (int $value) {
                switch ($value) {
                    case 0:
                        return 'Sedang diproses petugas';
                        break;

                    default:
                        # code...
                        break;
                }
            }
        );
    }

    public function waktu()
    {
        return $this->created_at->locale('id')->diffForHumans(
            now(),
            CarbonInterface::DIFF_RELATIVE_AUTO,
            true,
            3
        );
    }
}
