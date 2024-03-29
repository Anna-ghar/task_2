<?php
require_once '../models/ArticleModel.php';
require_once '../config/db.php';

 class ArticleController
 {
     private $articleModel;
     private $createModel;
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

     public function createArticle()
     {   include '../views/articles/create.php';
         if (isset($_POST['submit']) && isset($_POST['title']) && isset($_POST['content'])) {
             $this->articleModel->createNewArticle($_POST['title'],$_POST['content']);
             header("Location: ../public/index.php?route=show");
         }
     }

     public  function DeleteArticle()
     {

         if (isset($_GET['id'])) {
             $id = $_GET['id'];
             $this->articleModel->deleteThisArticle($id);
         }
         $articles = $this->articleModel->getAllArticles();
         include '../views/articles/show.php';

     }

     public function UpdateArticle()
     {
         include '../views/articles/Update.php';
         if (isset($_POST['newTitle']) && isset($_POST['newContent']) && isset($_POST['submit'])) {
             $id = $_GET['id'];
             $title = $_POST['newTitle'];
             $content = $_POST['newContent'];

             $this->articleModel->updateThisArticle($id,$title,$content);
             header("Location: ../public/index.php?route=show");}
     }

     public function ViewArticle()
     {
         if (isset($_GET['id'])) {
             $id = $_GET['id'];
         }

         $article = $this->articleModel->getArticle($id);
         include '../views/articles/view.php';


     }
 }