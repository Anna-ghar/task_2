<?php

class Article{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllArticles(){
        $sql = 'SELECT * FROM articles';
        $stmt = $this->db->query($sql);
        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
