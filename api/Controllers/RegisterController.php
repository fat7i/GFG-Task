<?php

namespace Api\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Api\Services\UserService;

class RegisterController extends Controller
{

    /**
     * @var UserService
     */
    private $userService;

    /**
     * RegisterController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $response = $this->userService
            ->register($request->get('name'), $request->get('email'), $request->get('password'));

        return response()->json($response['response'], $response['status_code']);
    }
}
