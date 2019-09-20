<?php


namespace App\Models;

use App\Base\SluggableModel;

/**
 * Class Group
 * @package App\Models
 * @property User user
 */
class Group extends SluggableModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id'];

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() :\Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ips() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(InternetProtocol::class, "group_id");
    }
}
