<?php

class Create
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createNewArticle($title, $content)
    {
        $date = date('Y-m-d H:m:s');

        $sql = 'INSERT INTO articles (name, content, date) VALUES (?,?,?)';
        $stmt = $this->db->prepare($sql);
        if ($stmt) {
            $stmt->bindParam(1, $title);
            $stmt->bindParam(2, $content);
            $stmt->bindParam(3, $date);
            $stmt->execute();
        }
    }
}
