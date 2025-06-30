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
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            $user = new User(
                (int) $userData['id'],
                $userData['username'],
                $userData['email'],
                $userData['password'],
                $userData['role'],
                new \DateTimeImmutable($userData['created_at'])
            );
            return $user;
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