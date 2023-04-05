<?php

namespace App\Models;

use Management\Database\DB;

class IncomingVehiclesModel
{
    private object $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function get_all()
    {
        $this->db->select(table: 'vehicle', column: "id , parking_number , owner_name , registration_number , vehicle_intime", where: "vehicle_status = 1");
        $data = $this->db->get_result();
        return $data[0];
    }

    public function get(int $id)
    {
        $id = $this->db->escapestring($id);
        $this->db->select(table: 'vehicle', where: "id = $id and vehicle_status = 1");
        $data = $this->db->get_result();
        return $data[0];
    }

    public function view_vehicle($id)
    {
        $id = $this->db->escapestring($id);
        $this->db->select(table: 'vehicle', column: "vehicle.id , vehicle.parking_number , vehicle.vehicle_company , vehicle.registration_number , vehicle.owner_name , vehicle.owner_contact , vehicle.vehicle_intime , vehicle_category.category_name , vehicle_category.parking_charge", join: 'vehicle_category ON vehicle.vehicle_category = vehicle_category.id', where: "vehicle.id = $id and vehicle.vehicle_status = 1");
        $data = $this->db->get_result();
        return $data[0];
    }

    public function vehicle_category()
    {
        $this->db->select(table: 'vehicle_category', column: 'id , category_name , category_status');
        $data = $this->db->get_result();
        return $data[0];
    }

    public function insert(array $data)
    {
        return $this->db->insert(table: 'vehicle', data: $data);
    }

    public function update(array $data, int $id)
    {
        $id = $this->db->escapestring($id);
        return $this->db->update(table: 'vehicle', updated_data: $data, where: "id = $id");
    }

    public function delete(int $id)
    {
        $id = $this->db->escapestring($id);
        return $this->db->delete(table: 'vehicle', where: "id = $id and vehicle_status = 1");
    }
}
