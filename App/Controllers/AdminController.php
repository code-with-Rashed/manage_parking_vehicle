<?php

namespace App\Controllers;

use Management\Classes\Validation;
use Management\Classes\Filtration;
use Management\Classes\Csrf;
use Management\Classes\Hash;
use Management\Classes\Session;
use App\Models\AdminModel;

class AdminController
{
    public function index()
    {
        if (Session::get('admin_login')) {
            return redirect('/dashboard');
        }
        $csrf_token = Csrf::create();
        return view("index", $csrf_token);
    }
    public function login()
    {
        $requirment = [
            'csrf_token' => ['required'],
            'username' => ['required', 'max:50'],
            'password' => ['required', 'max:50']
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
            return redirect("/");
        }
        $data = [
            'username' => $_POST['username']
        ];
        $admin_model = new AdminModel();
        $admin_data = $admin_model->check($data);
        if (Hash::match($_POST['password'], $admin_data[0]['password'])) {
            Session::set('admin_login', true);
            Session::set('admin_id', $admin_data[0]['id']);
            Session::set('admin_name', $admin_data[0]['name']);
            return redirect('/dashboard');
        }
        return redirect('/');
    }
    public function logout()
    {
        Session::clear();
        return redirect('/');
    }
    public function profile()
    {
        if (!Session::get('admin_login')) {
            return redirect('/');
        }
        $csrf_token = Csrf::create();
        $id = Session::get('admin_id');
        $admin_model = new AdminModel();
        $admin_data = $admin_model->profile($id);
        return view('/profile', $admin_data[0], $csrf_token);
    }
    public function update()
    {
        $requirment = [
            'csrf_token' => ['required'],
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50'],
            'phone' => ['required', 'max:11', 'min:11'],
            'username' => ['required', 'max:50'],
            'password' => ['max:50']
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
            return redirect('/profile');
        }
        $id = $_POST['id'];
        $data = Filtration::filter(
            [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'username' => $_POST['username'],
            ]
        );
        if (!empty($_POST['password'])) {
            $password = Hash::make($_POST['password']);
            $password = ['password' => $password];
            $data = array_merge($data, $password);
        }
        $admin_model = new AdminModel();
        if ($admin_model->update($id, $data)) {
            Session::set('admin_name', $_POST['name']);
            return redirect('/profile');
        }
    }
}
