<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class Comment {
    private int $id;
    private string $content;
    private User $author;
    private Post $post;

    public function __construct(int $id, string $content, User $author, Post $post) {
        $this->id = $id;
        $this->content = $content;
        $this->author = $author;
        $this->post = $post;
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

    public function getAuthor(): User {
        return $this->author;
    }
    public function setAuthor(User $author): void {
        $this->author = $author;
    }

    public function getPost(): Post {
        return $this->post;
    }
    public function setPost(Post $post): void {
        $this->post = $post;
    }
}