<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

Route::match([Request::METHOD_GET, Request::METHOD_POST], 'v1', [ApiController::class, 'handle']);

Route::any('{any?}', static function () {
    return response(
        [
            "status" => "error",
            "code" => Response::HTTP_NOT_FOUND,
            "message" => "Unknown route"
        ],
        Response::HTTP_NOT_FOUND);
})->where('any', '^.*$');
