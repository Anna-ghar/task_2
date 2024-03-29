<?php

class Article
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllArticles()
    {
        $sql = 'SELECT * FROM articles';
        $stmt = $this->db->query($sql);
        return  $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public function deleteThisArticle($id)
    {
        $sql = "DELETE FROM articles WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(':id' => $id));

    }

    public function updateThisArticle($id, $title, $content)
    {
        $sql = "UPDATE articles SET name = :title, content = :content WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array(':title' => $title, ':content' => $content, ':id' => $id));
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
