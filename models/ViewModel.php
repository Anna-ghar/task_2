<?php
class View
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getArticle($id)
    {
        $sql = 'SELECT * FROM articles WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $article = $stmt->fetch(PDO::FETCH_ASSOC);
        return $article;
    }



}
