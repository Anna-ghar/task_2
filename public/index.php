<?php

require_once '../config/db.php';
require_once '../controlers/ArticleController.php';
require_once '../controlers/AdminController.php';

//require_once '../controlers/ViewController.php';
global $db;





$route = $_GET['route'] ?? 'login';

switch ($route) {
    case 'login':
        $login = new AdminController($db);
        $login->LogIn();
        break;
    case 'show':
        $show = new ArticleController($db);
        $show->show();
        break;
    case 'delete':
        $delete = new ArticleController($db);
        $delete->DeleteArticle();
        break;
    case 'create':
        $create = new ArticleController($db);
        $create->createArticle();
        break;
    case 'view':
        $view = new ArticleController($db);
        $view->ViewArticle();
        break;
    case 'update':
        $update = new ArticleController($db);
        $update->UpdateArticle();
        break;

}
