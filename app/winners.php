<?php

namespace App;

use App\Model;
use Carbon\Carbon;

class winners extends Model
{
    public function getUserName($id)
    {
        $username = User::find($id);
        return $username;
    }

    public function gewonnenop($value)
    {
        return $value->format('d-m-Y');
    }
}
