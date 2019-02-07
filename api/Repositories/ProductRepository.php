<?php

namespace Api\Repositories;

use Api\Models\Product;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductRepository implements RepositoryInterface
{
    /**
     * @var Product
     */
    private $model;


    /**
     * ProductRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    /**
     * @param string $query
     * @param string $brandName
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function search(string $query = '', string $brandName = '', int $perPage = 10): LengthAwarePaginator
    {
         return $this->model->search($query, $brandName, $perPage);
    }
}
