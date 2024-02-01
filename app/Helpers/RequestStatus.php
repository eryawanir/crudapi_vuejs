<?php

namespace App\Helpers;

use App\Helpers\Trait\EnumToArray;

enum RequestStatus: int
{
    use EnumToArray;
    case Requested = 0;
    case Diterima = 1;
    case Ditolak = 2;
}
