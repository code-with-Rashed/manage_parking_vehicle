<?php

use Management\Classes\Router;

// Admin Routers
use App\Controllers\AdminController;
Router::get('/', [AdminController::class, 'index']);
Router::post('/login', [AdminController::class, 'login']);
Router::get('/logout', [AdminController::class, 'logout']);
Router::post("/profile/update", [AdminController::class, "update"]);
Router::get("/profile", [AdminController::class, "profile"]);
//--------------

// Dashboard Routers
use App\Controllers\DashboardController;
Router::get("/dashboard",[DashboardController::class,"index"]);
//------------------

// Vehicle Category Routers 
use App\Controllers\VehicleCategoryController;
Router::get("/category", [VehicleCategoryController::class, "index"]);
Router::get("/add/category", [VehicleCategoryController::class, "add_vehicle_category"]);
Router::get("/edit/category/{id}", [VehicleCategoryController::class, "edit_vehicle_category"]);
Router::get("/delete/category/{id}", [VehicleCategoryController::class, "delete"]);
Router::post("/add/category", [VehicleCategoryController::class, "insert"]);
Router::post("/update/category/{id}", [VehicleCategoryController::class, "update"]);
//--------------------------

// Vehicles Routers
use App\Controllers\IncomingVehiclesController;
Router::get("/incoming/vehicle/list", [IncomingVehiclesController::class, "index"]);
Router::get("/add/new/vehicle", [IncomingVehiclesController::class, "add_vehicle"]);
Router::get("/edit/registered/vehicle/{id}", [IncomingVehiclesController::class, "edit_registered_vehicle"]);
Router::get("/view/incoming/vehicle/details/{id}", [IncomingVehiclesController::class, "view_vehicle_details"]);
Router::get("/vehicle/delete/{id}", [IncomingVehiclesController::class, "delete"]);
Router::post("/add/new/vehicle", [IncomingVehiclesController::class, "insert"]);
Router::post("/update/registered/vehicle", [IncomingVehiclesController::class, "update"]);
Router::post("/incoming/vehicle/outgoing",[IncomingVehiclesController::class,"vehicle_outgoing"]);
//-----------------

// Outgoing Vehicle Routers
use App\Controllers\OutgoingVehiclesController;
Router::get("/outgoing/vehicle/list",[OutgoingVehiclesController::class,"index"]);
Router::get("/view/outgoing/vehicle/details/{id}",[OutgoingVehiclesController::class,"view_outgoing_vehicle_details"]);
//------------------------

// Report Routers
use App\Controllers\ReportController;
Router::get("/search/vehicle/report",[ReportController::class,"index"]);
Router::post("/search/report",[ReportController::class,"report"]);
//---------------