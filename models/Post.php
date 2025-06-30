<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class Post {
    private int $id;
    private string $title;
    private string $excerpt;
    private string $content;
    private User $author;
    private array $categories;
    private \DateTimeImmutable $createdAt;

    public function __construct(int $id, string $title, string $excerpt, string $content, User $author, \DateTimeImmutable $createdAt, array $categories = []) {
        $this->id = $id;
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->content = $content;
        $this->author = $author;
        $this->categories = $categories;
        $this->createdAt = $createdAt;
    }

    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getTitle(): string {
        return $this->title;
    }
    public function setTitle(string $title): void {
        $this->title = $title;
    }

        public function getExcerpt(): string {
        return $this->excerpt;
    }
    public function setExcerpt(string $excerpt): void {
        $this->excerpt = $excerpt;
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

    public function getCategories(): array {
        return $this->categories;
    }
    public function setCategories(array $categories): void {
        $this->categories = $categories;
    }

    public function getCreatedAt(): \DateTimeImmutable {
        return $this->createdAt;
    }
    public function setCreatedAt(\DateTimeImmutable $createdAt): void {
        $this->createdAt = $createdAt;
    }
}