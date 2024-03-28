<?php

require_once '../models/AdminModel.php';
require_once '../config/db.php';

class AdminController
{
    private $adminModel;
    private $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->adminModel = new Admin($this->db);
    }


    public function logIn()
    {
        include '../views/articles/login.php';
        session_start();
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $_SESSION['username'] = $username;



            if ($this->adminModel->authenticate($username,$password)) {
                header("Location: ../public/index.php?route=show");
            }else {
                echo "Wrong log in or password";
            }
        }
    }

}