<?php
require_once 'User.php';

class Admin extends User {
    public function addProject($title, $description, $image, $tags) {
        $stmt = $this->db->prepare("INSERT INTO projects (title, description, image, tags) VALUES (:title, :description, :image, :tags)");
        $stmt->execute([
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'tags' => implode(',', $tags)
        ]);
    }

    public function deleteProject($projectId) {
        $stmt = $this->db->prepare("DELETE FROM projects WHERE id = :id");
        $stmt->execute(['id' => $projectId]);
    }
}
?>