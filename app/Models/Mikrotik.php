<?php


namespace App\Models;

use App\Base\SluggableModel;

/**
 * Class Mikrotik
 * @package App\Models
 * @property string name
 * @property string url
 * @property string info
 * @property InternetProtocol[] ips
 */
class Mikrotik extends SluggableModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'url'];

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ips() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(InternetProtocol::class, "mikrotik_id");
    }
}
