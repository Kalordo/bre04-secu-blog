<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class CategoryManager extends AbstractManager {
    public function findAll(): array {
        $result = $this->db->query("SELECT * FROM categories");
        $categoriesResult = $result->fetchAll(PDO::FETCH_ASSOC);

        $categories = [];

        foreach ($categoriesResult as $categoryData) {
            $categories[] = new Category(
                (int) $categoryData['id'],
                $categoryData['title'],
                $categoryData['description']
            );
        }

        return $categories;
    }

    public function findOne(int $id): ?Category {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $categoryData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($categoryData) {
            return new Category(
                (int) $categoryData['id'],
                $categoryData['title'],
                $categoryData['description']
            );
        }

        return null;
    }
}