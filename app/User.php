<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use App\Draw;
use Socialite;
use FCM;
use App\Appointment;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Cache;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function draws()
    {
        return $this->belongsToMany(Draw::class, 'draw_product');
    }

    public function todo()
    {
        return $this->hasMany(Todo::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();;
    }
    public function faqDeleteAccess()
    {
        echo array_search(auth()->user()->id, $users);
        if (auth()->user()->id === 1) {
            return true;
        } else {
            return false;
        }
    }
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            $c = $this->hasAnyRole($roles);
            //dd($c);
            if ($c === false) {
                abort('401', 'Je mag hier niet komen.');
            }
            //abort(401, 'This action is unauthorized.');
        }
        // return $this->hasRole($roles) ||
        //        abort(401, 'This action is unauthorized.');
    }
    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function pushRegistration()
    {
        return $this->hasOne('App\PushNotification');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function inbox()
    {
        return $this->hasMany(Appointments::class);
    }

    public function isOnline()
    {
        //return Cache::has('user-is-online-' . $this->id);
        $test = Cache::has('user-is-online-' . $this->id);

        return $test;
    }
}
