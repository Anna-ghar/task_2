<?php

class Admin
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function authenticate($username,$password)
    {

        $sql = "SELECT * FROM admin WHERE login = :login";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(':login' => $username));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $adminPassword = $row['password'];
            if (password_verify($password,$adminPassword)) {
                return true;
            }else {
                return false;
            }
        }
    }


}
