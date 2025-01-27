<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    private const REQUEST_MAP = [
        Request::METHOD_GET => [
            'rates' => [self::class, 'rates']
        ],
        Request::METHOD_POST => [
            'convert' => [self::class, 'convert'],
        ],
    ];
    public function handle(Request $request): Response
    {
        if (isset($routes[$request->method()][$request->get('method')])) {
            return $routes[$request->method()][$request->get('method')]($request);
        }

        return response();
    }

    public function rates(Request $request)
    {
        // get data
        // filter (only with param)
        // send response
    }

    public function convert(Request $request)
    {

    }
}
