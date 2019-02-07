<?php

namespace Api\Services;

use Api\Tasks\SearchTask;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductService
{
    /**
     * @var SearchTask
     */
    private $searchTask;


    /**
     * ProductService constructor.
     * @param SearchTask $searchTask
     */
    public function __construct(SearchTask $searchTask)
    {
        $this->searchTask = $searchTask;
    }

    /**
     * @param string $query
     * @param string $brandName
     * @return LengthAwarePaginator
     */
    public function search(string $query = '', string $brandName = ''): LengthAwarePaginator
    {
        return $this->searchTask
            ->setQuery($query)
            ->setBrandName($brandName)
            ->run();
    }
}
