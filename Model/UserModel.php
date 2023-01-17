<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class UserModel extends Database
{
    public function getUsers($limit)
    {
        $query = "SELECT * FROM user ORDER BY user_id ASC LIMIT ?";
        $params =[
            "i" => $limit
        ];
        return $this->select($query, $params);
    }
}