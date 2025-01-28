<?php

namespace Tests;

// use App\Product;

use PDO;
use App\Post;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class PostTest extends TestCase
{
    protected PDO $db;
    protected Post $post;

    protected function setUp(): void
    {
        parent::setUp();

        $this->db = new PDO('sqlite::memory:');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $this->db->exec("
            CREATE TABLE posts (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT NOT NULL,
                content TEXT NOT NULL
            )
        ");

        $this->post = new Post($this->db);
    }

    #[Test]
    public function it_returns_an_integer_id_after_register_creation()
    {
        $postId = $this->post->create('Mi Post', 'Esto es Post mío.');
        $this->assertIsInt(1, $postId);
    }

    #[Test]
    public function creating_two_posts_returns_ids_consecutive()
    {
        $firstPostId = $this->post->create('Mi Post', 'Esto es Post mío.');
        $secondPostId = $this->post->create('Otro Post', 'Esto es un SEGUNDO Post mío.');

        $this->assertEquals($firstPostId, $secondPostId - $firstPostId);
    }

    #[Test]
    public function it_verifies_the_data_of_a_created_register()
    {
        $title = 'Mi Post - Verificado';
        $content = 'Esto es Post mío. - Verificado';
        $postId = $this->post->create($title, $content);
        $post = $this->post->findById($postId);

        $this->assertNotNull($post);
        $this->assertEquals($post['title'], $title);
        $this->assertEquals($post['content'], $content);
    }

    #[Test]
    public function it_verifies_that_the_register_not_exist()
    {
        $post = $this->post->findById(1);

        $this->assertNull($post);
    }
}
