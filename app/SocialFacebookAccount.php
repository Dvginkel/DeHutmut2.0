<?php

// SocialFacebookAccount.php

namespace App;

use App\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class SocialFacebookAccount extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'provider_user_id', 'provider'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
