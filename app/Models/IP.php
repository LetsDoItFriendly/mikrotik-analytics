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
 * @property Group group
 * @property Mikrotik mikrotik
 */
class IP extends SluggableModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'ips';
    protected $fillable = ['name', 'gateway', 'type', 'group_id', 'mikrotik_id'];
    public $timestamps = true;

    public static $types = [
        'unknown' => 0,
        'PC' => 1,
        'android' => 2,
        'ios' => 3,
        'tablet' => 4,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Group::class, "group_id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mikrotik() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Mikrotik::class, "mikrotik_id");
    }
}
