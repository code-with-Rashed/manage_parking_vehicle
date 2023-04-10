<?php

namespace App\Controllers;

use Management\Classes\Session;
use App\Models\DashboardModel;

class DashboardController
{
    public function __construct()
    {
        if (!Session::get('admin_login')) {
            return redirect('/');
        }
    }
    public function index()
    {
        $dashboard_model = new DashboardModel();
        $summary = $dashboard_model->summary();
        $data = array_merge(...$summary);
        return view("dashboard",$data);
    }
}
