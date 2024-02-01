<?php

namespace App\Helpers;

use App\Helpers\Trait\EnumToArray;

enum BookStatus: int
{
    use EnumToArray;
    case Tersedia = 0;
    case Dipinjam = 1;
    case Hilang = 2;
}
