<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Group extends Model
{
    protected $table = "groups";

    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id'
    ];



    /*
     * Relations Methods
     */

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo("\\App\\User", "user_id");
    }
}
