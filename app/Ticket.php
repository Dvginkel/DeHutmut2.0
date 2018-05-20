<?php

namespace App;

use App\Model;
use Carbon\Carbon;

class Ticket extends Model
{
    public function eindeLoting($value)
    {
        return $value->format('d-m-Y H:i:s');
    }
}
