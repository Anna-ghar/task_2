<?php

class Delete
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

     public function deleteThisArticle($id)
     {
         $sql = "DELETE FROM articles WHERE id = :id";
         $stmt = $this->db->prepare($sql);
         $stmt->execute(array(':id' => $id));

     }
}