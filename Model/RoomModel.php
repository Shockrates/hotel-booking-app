<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class RoomModel extends Database
{
    public function getRooms($limit)
    {
        $query = "SELECT * FROM room ORDER BY room_id ASC LIMIT ?";
        $params =[
            "i" => $limit
        ];
        return $this->select($query, $params);
    }
}