<?php

namespace Api\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * @var string
     */
    protected $table = 'brands';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('Api\Models\Product');
    }
}
