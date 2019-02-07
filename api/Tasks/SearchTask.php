<?php

namespace Api\Tasks;

use Api\Repositories\ProductRepository;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SearchTask implements TaskInterface
{

    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @var
     */
    private $query;

    /**
     * @var
     */
    private $brandName;

    /**
     * SearchTask constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function run(): LengthAwarePaginator
    {
        return $this->productRepository
            ->search($this->query, $this->brandName);
    }

    /**
     * @param string $query
     * @return SearchTask
     */
    public function setQuery(string $query): SearchTask
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param string $brandName
     * @return SearchTask
     */
    public function setBrandName(string $brandName): SearchTask
    {
        $this->brandName = $brandName;
        return $this;
    }
}
