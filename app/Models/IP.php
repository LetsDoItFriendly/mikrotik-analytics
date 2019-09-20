<?php


namespace App\Models;


use App\Base\SluggableModel;

/**
 * Class IP
 * @package App\Models
 * @property string name
 * @property string gateway
 * @property integer type
 * @property integer group_id
 * @property integer mikrotik_id
 * @property Group[] groups
 * @property Mikrotik[] mikrotiks
 */
class IP extends SluggableModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'gateway', 'type', 'group_id', 'mikrotik_id'];
    public $timestamps = true;

    public static $types = [
        0 => 'other',
        1 => 'PC',
        2 => 'android',
        3 => 'ios',
        4 => 'tablet',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function groups() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Group::class, "group_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mikrotiks() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Mikrotik::class, "mikrotik_id");
    }
}
