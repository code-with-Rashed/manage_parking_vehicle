<?php

namespace App\Models;

use Management\Database\DB;

class OutgoingVehiclesModel
{
    private object $db;
    public function __construct()
    {
        $this->db = new DB();
    }

    public function get_all()
    {
        $this->db->select(table: 'vehicle', column: "id , parking_number , owner_name , registration_number , vehicle_outtime", where: "vehicle_status = 0");
        $data = $this->db->get_result();
        return $data[0];
    }

    public function view_outgoing_vehicle($id)
    {
        $id = $this->db->escapestring($id);
        $this->db->select(table: 'vehicle', column: "vehicle.parking_number , vehicle.vehicle_company , vehicle.registration_number , vehicle.owner_name , vehicle.owner_contact , vehicle.vehicle_intime , vehicle.vehicle_outtime , vehicle.parking_charges , vehicle_category.category_name", join: 'vehicle_category ON vehicle.vehicle_category = vehicle_category.id', where: "vehicle.id = $id and vehicle.vehicle_status = 0");
        $data = $this->db->get_result();
        return $data[0];
    }
}
