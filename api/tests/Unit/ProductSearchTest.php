<?php

namespace ApiTests\Unit;

use Api\Models\Product;
use Api\Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class ProductSearchTest extends TestCase
{
    /**
     * @var
     */
    private $model;

    /**
     *
     */
    public function setUp()
    {
        parent::setUp();
        Artisan::call('db:seed', ['--database' => 'mysql_test']);
        $this->model = new Product();
    }

    /**
     *
     */
    public function testSearch()
    {
        $result = $this->model->search('black', 'levis', 10);


        $this->assertIsObject($result);
        $this->assertInstanceOf('Illuminate\Pagination\LengthAwarePaginator', $result);
        $this->assertObjectHasAttribute('items', $result);
        $this->assertContainsOnlyInstancesOf($this->model, $result);
    }
}
