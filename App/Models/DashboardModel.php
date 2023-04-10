<?php

namespace App\Models;

use Management\Database\DB;

class DashboardModel
{
    private object $db;
    private array $summary = [];

    public function __construct()
    {
        $this->db = new DB();
    }
    public function today_incoming_vehicles()
    {
        $this->db->sql("SELECT COUNT(*) AS today_incoming_vehicles FROM vehicle WHERE DATE(vehicle_intime) = CURDATE() AND vehicle_status = 1");
        $result = $this->db->get_result();
        array_push($this->summary, $result[0]);
    }
    public function today_outgoing_vehicles()
    {
        $this->db->sql("SELECT COUNT(*) AS today_outgoing_vehicles FROM vehicle WHERE DATE(vehicle_outtime) = CURDATE() AND vehicle_status = 0");
        $result = $this->db->get_result();
        array_push($this->summary, $result[0]);
    }
    public function total_vehicle_category()
    {
        $this->db->sql("SELECT COUNT(*) AS total_vehicle_category FROM vehicle_category WHERE category_status = 1");
        $result = $this->db->get_result();
        array_push($this->summary, $result[0]);
    }
    public function total_incoming_vehicle()
    {
        $this->db->sql("SELECT COUNT(*) AS total_incoming_vehicle FROM vehicle WHERE vehicle_status = 1");
        $result = $this->db->get_result();
        array_push($this->summary, $result[0]);
    }
    public function summary()
    {
        $this->today_incoming_vehicles();
        $this->today_outgoing_vehicles();
        $this->total_vehicle_category();
        $this->total_incoming_vehicle();
        return $this->summary;
    }
}
