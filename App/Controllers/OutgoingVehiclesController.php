<?php

namespace App\Controllers;

use App\Models\OutgoingVehiclesModel;
use Management\Classes\Session;

class OutgoingVehiclesController
{
    private object $outgoing_vehicles_model;
    public function __construct()
    {
        if (!Session::get('admin_login')) {
            return redirect('/');
        }
        $this->outgoing_vehicles_model = new OutgoingVehiclesModel();
    }
    public function index()
    {
        $outgoing_vehicles = $this->outgoing_vehicles_model->get_all();
        return view("outgoing_vehicles", $outgoing_vehicles);
    }
    public function view_outgoing_vehicle_details(int $id)
    {
        $view_outgoing_vehicle = $this->outgoing_vehicles_model->view_outgoing_vehicle($id);
        if (empty($view_outgoing_vehicle)) {
            return redirect("/outgoing/vehicle/list");
        }
        return view("view_outgoing_vehicle_details", $view_outgoing_vehicle);
    }
}
