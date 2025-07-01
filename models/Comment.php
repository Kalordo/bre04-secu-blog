<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class Comment {
    private int $id;
    private string $content;
    private int $userId;
    private int $postId;
    private string $createdAt;

    public function __construct(int $id, string $content, int $userId, int $postId, string $createdAt) {
        $this->id = $id; 
        $this->content = $content;
        $this->userId = $userId;
        $this->postId = $postId;
        $this->createdAt = $createdAt;
    }


    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getContent(): string {
        return $this->content;
    }
    public function setContent(string $content): void {
        $this->content = $content;
    }

    public function getUserId(): int {
        return $this->userId;
    }
    public function setUserId(int $userId): void {
        $this->userId = $userId;
    }

    public function getPostId(): int {
        return $this->postId;
    }
    public function setPostId(int $postId): void {
        $this->postId = $postId;
    }

    public function getCreatedAt(): string {
        return $this->createdAt;
    }
    public function setCreatedAt(string $createdAt): void {
        $this->createdAt = $createdAt;
    }
}