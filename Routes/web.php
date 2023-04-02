<?php

use Management\Classes\Router;

// Vehicle Category Routers 
use App\Controllers\VehicleCategoryController;
Router::get("/category",[VehicleCategoryController::class,"index"]);
Router::get("/add/category",[VehicleCategoryController::class,"add_vehicle_category"]);
Router::get("/edit/category/{id}",[VehicleCategoryController::class,"edit_vehicle_category"]);
Router::get("/delete/category/{id}",[VehicleCategoryController::class,"delete"]);
Router::post("/add/category",[VehicleCategoryController::class,"insert"]);
Router::post("/update/category/{id}",[VehicleCategoryController::class,"update"]);
//--------------------------