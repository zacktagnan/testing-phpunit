<?php

namespace App;

use PDO;

class Post
{
    public function __construct(private PDO $db)
    {}

    public function create($title, $content)
    {
        $sql = "INSERT INTO posts (title, content) VALUES (:title, :content)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->execute();

        return (int) $this->db->lastInsertId();
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM posts WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        return $post ?: null;
    }
}
