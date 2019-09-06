<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

/**
 * Class User
 * @package App\Models
 * @property Group[] groups
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['logged_in_at', 'logged_out_at'];

    /**
     * Set password encrypted
     *
     * @param $password
     */
    public function setPasswordAttribute($password): void
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * @return string
     */
    public function getPictureAttribute() : string
    {
        return 'https://ssl.gstatic.com/accounts/ui/avatar_2x.png';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groups() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Group::class, "user_id");
    }
}
