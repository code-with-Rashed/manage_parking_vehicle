<?php

namespace App\Controllers;

use Management\Classes\Csrf;
use Management\Classes\Validation;
use Management\Classes\Session;
use App\Models\ReportModel;
use Management\Classes\Filtration;

class ReportController
{
    public object $report_model;
    public function __construct()
    {
        if (!Session::get('admin_login')) {
            return redirect('/');
        }
        $this->report_model = new ReportModel();
    }
    public function index()
    {
        $csrf_token = Csrf::create();
        return view("search_vehicle_report", $csrf_token);
    }
    public function report()
    {
        $requirment = [
            'csrf_token' => ['required'],
            'from_date' => ['required'],
            'to_date' => ['required'],
            'search_option' => ['required'],
            'registration_number' => ['max:50'],
            'owner_name' => ['max:50'],
            'owner_contact' => ['max:12'],
        ];
        $validation = new Validation();
        $validation->validate($_POST, $requirment);
        $result = $validation->errors();
        if (count($result)) {
            echo '<pre>';
            print_r($result);
            die;
        }
        if (!Csrf::match($_POST['csrf_token'])) {
            return redirect('/search/vehicle/reports');
        }
        $data = Filtration::filter($_POST);
        $report_data = $this->report_model->report($data);
        return view("report",$report_data);
    }
}
