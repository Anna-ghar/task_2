<?php
 require_once '../models/ArticleModel.php';
 require_once '../config/db.php';

 class ArticleController
 {
     private $articleModel;
     private $db;

     public function __construct($db)
     {
         global $db;
         $this->db = $db;
         $this->articleModel = new Article($this->db);
     }
     public function show()
     {
         $articles = $this->articleModel->getAllArticles();
         include '../views/articles/show.php';
     }
 }