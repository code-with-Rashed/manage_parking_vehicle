<?php

namespace App\Controllers;

use Management\Classes\Csrf;
use Management\Classes\Session;
use Management\Classes\Validation;
use Management\Classes\Filtration;
use App\Models\VehicleCategoryModel;

class VehicleCategoryController
{
    private object $vc_model;
    public function __construct()
    {
        if (!Session::get('admin_login')) {
            return redirect('/');
        }
        $this->vc_model = new VehicleCategoryModel();
    }

    public function index()
    {
        $data = $this->vc_model->get_all();
        return view("vehicle_category", $data);
    }

    public function add_vehicle_category()
    {
        $csrf_token = Csrf::create();
        return view("add_vehicle_category", $csrf_token);
    }

    public function edit_vehicle_category($id)
    {
        $data = $this->vc_model->get($id);
        if (empty($data)) {
            return redirect("/category");
        }
        $csrf_token = Csrf::create();
        return view("edit_vehicle_category", $data[0], $csrf_token);
    }

    public function insert()
    {
        $requirment = [
            'csrf_token' => ['required'],
            'name' => ['required', 'max:50'],
            'charge' => ['required', 'integer', 'max:10'],
            'status' => ['min:1', 'max:1']
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $result = $validation->errors();
        if (count($result)) {
            echo "<pre>";
            print_r($result);
            die;
        }
        if (!Csrf::match($_POST["csrf_token"])) {
            return redirect("/add/category");
        }
        $data = Filtration::filter(
            [
                "category_name" => $_POST["name"],
                "parking_charge" => $_POST["charge"],
                "category_status" => $_POST["status"]
            ]
        );
        if (!$this->vc_model->insert($data)) {
            return redirect("/add/category");
        } else {
            return redirect("/category");
        }
    }

    public function update($id)
    {
        $requirment = [
            'csrf_token' => ['required'],
            'name' => ['required', 'max:50'],
            'charge' => ['required', 'max:10'],
            'status' => ['min:1', 'max:1']
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $result = $validation->errors();
        if (count($result)) {
            echo "<pre>";
            print_r($result);
            die;
        }
        if (!Csrf::match($_POST["csrf_token"])) {
            return redirect("/edit/category/" . $id);
        }
        $data = Filtration::filter(
            [
                "category_name" => $_POST["name"],
                "parking_charge" => $_POST["charge"],
                "category_status" => $_POST["status"]
            ]
        );
        if (!$this->vc_model->update($data, $id)) {
            return redirect("/edit/category/" . $id);
        } else {
            return redirect("/category");
        }
    }

    public function delete($id)
    {
        $this->vc_model->delete($id);
        return redirect("/category");
    }
}
