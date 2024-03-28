<?php
require_once '../models/UpdateModel.php';
require_once '../config/db.php';

class UpdateController{
    private $db;
    private $updateModel;

    public function __construct($db){
        global $db;
        $this->db=$db;
        $this->updateModel = new Update($db);
    }

    public function UpdateArticle()
    {
        include '../views/articles/Update.php';
        if(isset($_POST['newTitle']) && isset($_POST['newContent']) && isset($_POST['submit'])){
            $id = $_GET['id'];
            $title = $_POST['newTitle'];
            $content = $_POST['newContent'];

        $this->updateModel->updateThisArticle($id,$title,$content);
        header("Location: ../public/index.php?route=show");}
    }
}