<?php

class Update{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function updateThisArticle($id, $title, $content) {
        $sql = "UPDATE articles SET name = :title, content = :content WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(':title' => $title, ':content' => $content, ':id' => $id));
    }

}
