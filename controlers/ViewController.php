<?php
require_once '../models/ViewModel.php';
require_once '../config/db.php';

class ViewController{
    private $db;
    private $viewModel;


    public function __construct($db)
    {
        global $db;
        $this->db = $db;
        $this->viewModel = new View($this->db);


    }

    public function ViewArticle()
    {
        if (isset($_GET['id'])){
            $id = $_GET['id'];
        }

        $article = $this->viewModel->getArticle($id);
        include '../views/articles/view.php';


    }



}
