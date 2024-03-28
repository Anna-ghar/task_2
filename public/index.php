<?php

require_once '../config/db.php';
require_once '../controlers/ArticleController.php';
require_once '../controlers/AdminController.php';
require_once '../controlers/CreateController.php';
require_once '../controlers/DeleteController.php';
require_once '../controlers/ViewController.php';
require_once '../controlers/UpdateController.php';
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
        $delete = new DeleteController($db);
        $delete->DeleteArticle();
        break;
    case 'create':
        $create = new CreateController($db);
        $create->createArticle();
        break;
    case 'view':
        $view = new ViewController($db);
        $view->ViewArticle();
        break;
    case 'update':
        $update = new UpdateController($db);
        $update->UpdateArticle();
        break;

}
