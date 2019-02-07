<?php

namespace Api\Controllers;

use Api\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    /**
     * @var ProductService
     */
    private $productService;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|mixed
     */
    public function index(Request $request)
    {
        $query = '';
        $brand = '';
        $inputs = $request->all();

        if ($inputs) {
            $query = $inputs['q'];
            $brand = $inputs['brand'];
        }

        return $this->productService->search($query, $brand);
    }
}
