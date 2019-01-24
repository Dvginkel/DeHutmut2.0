<?php

namespace App;

use App\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;


class winners extends Model
{
    use SoftDeletes;
    
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
