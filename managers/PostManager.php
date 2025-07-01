<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class PostManager extends AbstractManager {
    public function findLatest(): array {
        $result = $this->db->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT 4");
        $postsResult = $result->fetchAll(PDO::FETCH_ASSOC);

        $posts = [];

        foreach ($postsResult as $postResult) {
            $posts[] = new Post(
                (int) $postResult['id'],
                $postResult['title'],
                $postResult['excerpt'],
                $postResult['content'],
                $postResult['author'],
                $postResult['created_at']
            );
        }
        return $posts;
    }

    public function findOne(int $id): ?Post {
        $stmt = $this->db->prepare("SELECT * FROM posts WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $postResult = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($postResult) {
            return new Post(
                (int) $postResult['id'],
                $postResult['title'],
                $postResult['excerpt'],
                $postResult['content'],
                $postResult['author'],
                $postResult['created_at']
            );
        }

        return null;
    }

    public function findByCategory(int $categoryId): array {
        $stmt = $this->db->prepare("
            SELECT p.id, p.title, p.excerpt, p.content, p.author, p.created_at
            FROM posts p
            INNER JOIN posts_categories pc ON pc.post_id = p.id
            WHERE pc.category_id = :categoryId
        ");
        $stmt->execute([':categoryId' => $categoryId]);

        $postsResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $posts = [];

        foreach ($postsResult as $postResult) {
            $posts[] = new Post(
                (int) $postResult['id'],
                $postResult['title'],
                $postResult['excerpt'],
                $postResult['content'],
                $postResult['author'],
                $postResult['created_at']
            );
        }

        return $posts;
    }
}