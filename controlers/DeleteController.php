<?php

require_once '../models/DeleteModel.php';
require_once '../models/ArticleModel.php';
require_once '../config/db.php';

class DeleteController{
    private $deleteModel;
    private $articleModel;
    private $db;

    public function __construct($db)
    {
        global $db;
        $this->db = $db;
        $this->deleteModel = new Delete($this->db);
        $this->articleModel= new Article($this->db);
    }

    public  function DeleteArticle()
    {

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $this->deleteModel->deleteThisArticle($id);
        }
        $articles = $this->articleModel->getAllArticles();
        include '../views/articles/show.php';




    }
}
