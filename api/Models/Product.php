<?php

namespace Api\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'stock',
        'price',
        'brand_id',
    ];

    /**
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'price' => 'required',
        'brand_id' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo('Api\Models\Brand');
    }

    /**
     * @param string $query
     * @param string $brandName
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function search(string $query = '', string $brandName = '', int $perPage = 10): LengthAwarePaginator
    {
        return $this->with('brand')
            ->whereHas('brand', function ($q) use ($brandName) {
                $q->where('name', 'like', $brandName . '%');
            })
            ->where('stock', '>', 1)
            ->where('title', 'like', '%' . $query . '%')
            ->paginate($perPage)
            ->appends(['q' => $query, 'brand' => $brandName]);
    }
}
