<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class UserManager extends AbstractManager {
    public function __construct() {
        parent::__construct();
    }

    public function findByEmail(string $email): ?User {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $userResult = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userResult) {
            $user = new User(
                (int) $userResult['id'],
                $userResult['username'],
                $userResult['email'],
                $userResult['password'],
                $userResult['role'],
                new \DateTimeImmutable($userResult['created_at'])
            );
            return $user;
        }

        return null;
    }

        public function findOne(int $id): ?User {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $userResult = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userResult) {
            return new User(
                (int) $userResult['id'],
                $userResult['username'],
                $userResult['email'],
                $userResult['password'],
                $userResult['role'],
                $userResult['created_at']
            );
        }

        return null;
    }

    public function create(User $user): bool {
        $stmt = $this->db->prepare("
            INSERT INTO users (username, email, password, role, created_at)
            VALUES (:username, :email, :password, :role, :created_at)
        ");

        return $stmt->execute([
            ':username' => $user->getUsername(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
            ':role' => $user->getRole(),
            ':created_at' => $user->getCreatedAt()->format('Y-m-d H:i:s')
        ]);
    }
}