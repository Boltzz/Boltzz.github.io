<?php
require_once 'classes/Admin.php';

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$admin = new Admin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $image = htmlspecialchars($_POST['image']);
        $tags = array_map('trim', explode(',', $_POST['tags']));
        $admin->addProject($title, $description, $image, $tags);
    } elseif (isset($_POST['delete'])) {
        $projectId = htmlspecialchars($_POST['projectId']);
        $admin->deleteProject($projectId);
    }
}

$projects = $admin->getDB()->query("SELECT * FROM projects")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>CMS Dashboard</title>
</head>
<body>
    <div class="section">
        <h2>CMS Dashboard</h2>
        <form method="POST">
            <h3>Add Project</h3>
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <input type="text" name="image" placeholder="Image URL" required>
            <input type="text" name="tags" placeholder="Tags (comma-separated)" required>
            <button type="submit" name="add">Add Project</button>
        </form>
        <h3>Existing Projects</h3>
        <ul>
            <?php foreach ($projects as $project): ?>
                <li>
                    <strong><?php echo htmlspecialchars($project['title']); ?></strong>
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="projectId" value="<?php echo $project['id']; ?>">
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>