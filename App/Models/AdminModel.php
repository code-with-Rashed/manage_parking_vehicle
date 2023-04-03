<?php

namespace App\Models;

use Management\Database\DB;

class AdminModel
{
    private object $db;
    public function __construct()
    {
        $this->db = new DB();
    }
    public function check($data)
    {
        $username = $this->db->escapestring($data['username']);
        $this->db->select('admin', where: "username = '{$username}'");
        $data = $this->db->get_result();
        return $data[0];
    }
    public function profile(int $id)
    {
        $id = $this->db->escapestring($id);
        $this->db->select('admin', where: "id=$id");
        $data = $this->db->get_result();
        return $data[0];
    }
    public function update(int $id, array $data)
    {
        return $this->db->update('admin', $data, "id=$id");
    }
}
