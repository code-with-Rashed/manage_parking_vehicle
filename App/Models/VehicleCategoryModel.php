<?php

namespace App\Models;

use Management\Database\DB;

class VehicleCategoryModel
{
    private object $db;
    public function __construct()
    {
        $this->db = new DB();
    }
    public function get_all()
    {
        $this->db->select('vehicle_category');
        $data = $this->db->get_result();
        return $data[0];
    }

    public function get(int $id)
    {
        $id = $this->db->escapestring($id);
        $this->db->select('vehicle_category', where: "id=$id");
        $data = $this->db->get_result();
        return $data[0];
    }

    public function insert(array $data)
    {
        return $this->db->insert('vehicle_category', $data);
    }

    public function update(array $data, int $id)
    {
        $id = $this->db->escapestring($id);
        return $this->db->update('vehicle_category', $data, "id=$id");
    }

    public function delete(int $id)
    {
        $id = $this->db->escapestring($id);
        $this->db->count_rows('vehicle', where: "vehicle_category = $id");
        $category_used = $this->db->get_result();
        if (!$category_used[0][0]) {
            return $this->db->delete('vehicle_category', "id = $id");
        }
        return false;
    }
}
