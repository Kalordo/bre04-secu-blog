<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class Category {
    private int $id;
    private string $title;
    private string $description;

    public function __construct(int $id, string $title, string $description) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
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

    public function getDescription() : string {
        return $this->description;
    }
    public function setDescription(string $description) {
        $this->description = $description;
    }
}