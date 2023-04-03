<?php

use Management\Classes\Router;

// Admin Routers
use App\Controllers\AdminController;
Router::get('/',[AdminController::class,'index']);
Router::post('/login',[AdminController::class,'login']);
Router::get('/logout',[AdminController::class,'logout']);
Router::post("/profile/update",[AdminController::class,"update"]);
Router::get("/profile",[AdminController::class,"profile"]);
//--------------

// Vehicle Category Routers 
use App\Controllers\VehicleCategoryController;
Router::get("/category",[VehicleCategoryController::class,"index"]);
Router::get("/add/category",[VehicleCategoryController::class,"add_vehicle_category"]);
Router::get("/edit/category/{id}",[VehicleCategoryController::class,"edit_vehicle_category"]);
Router::get("/delete/category/{id}",[VehicleCategoryController::class,"delete"]);
Router::post("/add/category",[VehicleCategoryController::class,"insert"]);
Router::post("/update/category/{id}",[VehicleCategoryController::class,"update"]);
//--------------------------