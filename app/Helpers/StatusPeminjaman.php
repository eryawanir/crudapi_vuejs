<?php

namespace App\Helpers;

use App\Helpers\Trait\EnumToArray;

enum StatusPeminjaman: int
{
    use EnumToArray;
    case BelumDiambil = 0;
    case Dipinjam = 1;
    case Selesai = 2;
}
