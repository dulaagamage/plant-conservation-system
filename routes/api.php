<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController;

Route::apiResource('plants', PlantController::class);
