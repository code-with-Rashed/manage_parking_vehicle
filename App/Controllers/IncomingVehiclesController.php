<?php

namespace App\Controllers;

use Management\Classes\Csrf;
use Management\Classes\Session;
use Management\Classes\Validation;
use App\Models\IncomingVehiclesModel;
use Management\Classes\Filtration;

class IncomingVehiclesController
{
    private object $vehicles_model;
    public function __construct()
    {
        if (!Session::get('admin_login')) {
            return redirect('/');
        }
        date_default_timezone_set(DEFAULT_TIMEZONE);
        $this->vehicles_model = new IncomingVehiclesModel();
    }
    public function index()
    {
        $vehicles = $this->vehicles_model->get_all();
        return view("vehicles", $vehicles);
    }

    public function add_vehicle()
    {
        $csrf_token = Csrf::create();
        $v_category = $this->vehicles_model->vehicle_category();
        return view("add_vehicle", $v_category, $csrf_token);
    }

    public function insert()
    {
        $requirment = [
            'csrf_token' => ['required'],
            'vehicle_category' => ['required', 'integer'],
            'vehicle_company' => ['required', 'max:200'],
            'registration_number' => ['required', 'max:100'],
            'owner_name' => ['required', 'max:60'],
            'owner_contact' => ['required', 'max:15'],
            'vehicle_intime' => ['required'],
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $result = $validation->errors();
        if (count($result)) {
            echo "<pre>";
            print_r($result);
            die;
        }
        if (!Csrf::match($_POST['csrf_token'])) {
            return redirect('/add/new/vehicle');
        }
        $data = Filtration::filter(
            [
                'parking_number' => random_int(100000000, 999999999),
                'vehicle_category' => $_POST['vehicle_category'],
                'vehicle_company' => $_POST['vehicle_company'],
                'registration_number' => $_POST['registration_number'],
                'owner_name' => $_POST['owner_name'],
                'owner_contact' => $_POST['owner_contact'],
                'vehicle_intime' => date("Y-m-d h:i A", strtotime($_POST['vehicle_intime'])),
                'vehicle_status' => 1
            ]
        );
        if (!$this->vehicles_model->insert($data)) {
            return redirect('/add/new/vehicle');
        } else {
            return redirect('/incoming/vehicle/list');
        }
    }

    public function edit_registered_vehicle($id)
    {
        $vehicle = $this->vehicles_model->get($id);
        if (empty($vehicle)) {
            return redirect('/incoming/vehicle/list');
        }
        $csrf_token = Csrf::create();
        $v_category = $this->vehicles_model->vehicle_category();
        return view("edit_registered_vehicle", $csrf_token, $v_category, $vehicle);
    }

    public function update()
    {
        $requirment = [
            'csrf_token' => ['required'],
            'id' => ['required', 'integer'],
            'vehicle_category' => ['required', 'integer'],
            'vehicle_company' => ['required', 'max:200'],
            'registration_number' => ['required', 'max:100'],
            'owner_name' => ['required', 'max:60'],
            'owner_contact' => ['required', 'max:15']
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $result = $validation->errors();
        if (count($result)) {
            echo "<pre>";
            print_r($result);
            die;
        }
        $id = $_POST['id'];
        if (!Csrf::match($_POST['csrf_token'])) {
            return redirect('/edit/registered/vehicle/' . $id);
        }
        $data = Filtration::filter(
            [
                'vehicle_category' => $_POST['vehicle_category'],
                'vehicle_company' => $_POST['vehicle_company'],
                'registration_number' => $_POST['registration_number'],
                'owner_name' => $_POST['owner_name'],
                'owner_contact' => $_POST['owner_contact']
            ]
        );
        if (!$this->vehicles_model->update($data, $id)) {
            return redirect('/edit/registered/vehicle/' . $id);
        } else {
            return redirect('/incoming/vehicle/list');
        }
    }

    public function view_vehicle_details($id)
    {
        $vehicle_detail = $this->vehicles_model->view_vehicle($id);
        if (empty($vehicle_detail)) {
            return redirect('/incoming/vehicle/list');
        }
        return view("view_vehicle_details", $vehicle_detail);
    }

    public function vehicle_outgoing()
    {
        $requirment = [
            'csrf_token' => ['required'],
            'id' => ['required', 'integer'],
            'vehicle_outtime' => ['required'],
            'parking_charges' => ['required', 'integer']

        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $result = $validation->errors();
        if (count($result)) {
            echo "<pre>";
            print_r($result);
            die;
        }
        $id = $_POST['id'];
        if (!Csrf::match($_POST['csrf_token'])) {
            return redirect('/view/incoming/vehicle/details/' . $id);
        }
        $data = Filtration::filter(
            [
                'vehicle_outtime' => $_POST['vehicle_outtime'],
                'parking_charges' => $_POST['parking_charges'],
                'vehicle_status' => 0,
            ]
        );
        if (!$this->vehicles_model->update($data, $id)) {
            return redirect('/view/incoming/vehicle/details/' . $id);
        } else {
            return redirect('/incoming/vehicle/list');
        }
    }
    public function delete($id)
    {
        $this->vehicles_model->delete($id);
        return redirect('/incoming/vehicle/list');
    }
}
