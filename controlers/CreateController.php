<?php
require_once '../models/CreateModel.php';
require_once '../config/db.php';
class CreateController{
    private $createModel;
    private $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
        $this->createModel= new Create($this->db);
    }

    public function createArticle()
    {   include '../views/articles/create.php';
        if (isset($_POST['submit']) && isset($_POST['title']) && isset($_POST['content'])) {
            $this->createModel->createNewArticle($_POST['title'],$_POST['content']);
            header("Location: ../public/index.php?route=show");
        }
    }
}
