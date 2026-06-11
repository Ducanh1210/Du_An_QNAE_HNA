<?php
namespace App\Models;

class UserModel extends BaseModel {
    
    public function getByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $this->setQuery($sql);
        return $this->loadRow([$username]);
    }

    public function getById($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function create($username, $passwordHash, $role = 'admin') {
        $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
        $this->setQuery($sql);
        return $this->execute([$username, $passwordHash, $role]);
    }

    public function updatePassword($id, $newPasswordHash) {
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$newPasswordHash, $id]);
    }
}
