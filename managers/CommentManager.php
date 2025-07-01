<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class CommentManager extends AbstractManager {
    public function findByPost(int $postId): array {
        $stmt = $this->db->prepare("
            SELECT c.id, c.content, c.user_id, c.post_id, c.created_at
            FROM comments c
            WHERE c.post_id = :postId
        ");
        $stmt->execute([':postId' => $postId]);

        $commentsResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $comments = [];

        foreach ($commentsResult as $commentResult) {
            $comments[] = new Comment(
                (int) $commentResult['id'],
                $commentResult['content'],
                $commentResult['user_id'],
                $commentResult['post_id'],
                $commentResult['created_at']
            );
        }

        return $comments;
    }

    public function create(Comment $comment): bool {
    $stmt = $this->db->prepare("
        INSERT INTO comments (content, user_id, post_id, created_at)
        VALUES (:content, :user_id, :post_id, :created_at)
    ");

        return $stmt->execute([
            ':content' => $comment->getContent(),
            ':user_id' => $comment->getUserId(),
            ':post_id' => $comment->getPostId(),
            ':created_at' => $comment->getCreatedAt()
        ]);
    }
}