<?php

namespace App\Models;

use Management\Database\DB;

class ReportModel
{
    private object $db;
    public function __construct()
    {
        $this->db = new DB();
    }
    public function report(array $data)
    {
        $search_option = $data['search_option'];
        $from_date = date("Y-m-d h:i A", strtotime($data['from_date']));
        $to_date = date("Y-m-d h:i A", strtotime($data['to_date']));
        $between_date = "((vehicle_intime >= '{$from_date}' AND vehicle_intime <= '{$to_date}') OR (vehicle_outtime >= '{$from_date}' AND vehicle_outtime <= '{$to_date}'))";
        $extra_condition = "";
        if ($search_option == 'incoming') {
            $extra_condition = " AND (vehicle_status = 1)";
        } else if ($search_option == 'outgoing') {
            $extra_condition = " AND (vehicle_status = 0)";
        } else if ($search_option == 'registration_number') {
            $extra_condition = " AND (registration_number LIKE '%{$data['registration_number']}')";
        } else if ($search_option == 'owner_name') {
            $extra_condition = " AND (owner_name LIKE '%{$data['owner_name']}')";
        } else if ($search_option == 'owner_contact') {
            $extra_condition = " AND (owner_contact LIKE '%{$data['owner_contact']}')";
        }

        $this->db->select(table: 'vehicle', where: $between_date . $extra_condition);
        $result = $this->db->get_result();
        return $result[0];
    }
}
