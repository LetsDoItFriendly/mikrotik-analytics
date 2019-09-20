<?php


namespace App\Models;

use App\Base\SluggableModel;

/**
 * Class Mikrotik
 * @package App\Models
 * @property string name
 * @property string url
 * @property string info
 */
class Mikrotik extends SluggableModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'url', 'info'];

    public $timestamps = true;
}
