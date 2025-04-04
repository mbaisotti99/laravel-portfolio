<?php

use App\Http\Controllers\API\ApiDeveloperController;
use App\Http\Controllers\API\ApiProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Route::get("projects", [ApiProjectController::class, "index"]);
// Route::get("projects/{project}", [ApiProjectController::class, "show"]);

Route::group(["prefix" => "projects"], function () {
    Route::get("", [ApiProjectController::class, "index"]);
    Route::get("{project}", [ApiProjectController::class, "show"]);
});

Route::group(["prefix" => "devs"], function () {
    Route::get("", [ApiDeveloperController::class, "index"]);
    Route::get("{dev}", [ApiDeveloperController::class, "show"]);
});