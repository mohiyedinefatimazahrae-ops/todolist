<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<!-- A. Configuration + connexion DB -->
<?php
// Database config
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_NAME', 'todolist');
define('DB_USER', 'root');
define('DB_PASS', '');

// Connexion PDO
try {
    $pdo = new PDO(
        "mysql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME,DB_USER,DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Erreur connexion DB");
}
// B. Traitement BACK-END (actions POST)
// ACTIONS
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ajouter une tâche
    if ($_POST['action'] === 'new') {
        $title = trim($_POST['title']);
        if (!empty($title)) {
            $stmt = $pdo->prepare("INSERT INTO todo(title) VALUES (?)");
            $stmt->execute([$title]);
        }
    }

    // Supprimer
    if ($_POST['action'] === 'delete') {
        $id = $_POST['id'];
        $stmt = $pdo->prepare("DELETE FROM todo WHERE id=?");
        $stmt->execute([$id]);
    }

    // Toggle done / undone
    if ($_POST['action'] === 'toggle') {
        $id = $_POST['id'];
        $stmt = $pdo->prepare(
            "UPDATE todo SET done = 1 - done WHERE id=?"
        );
        $stmt->execute([$id]);
    }
}
?>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <span class="navbar-brand">TodoList</span>
  </div>
</nav>

<div class="container mt-4">


<!-- FORM ADD -->
<form method="post" class="d-flex mb-4">
    <input type="hidden" name="action" value="new">
    <input type="text" name="title" class="form-control me-2" placeholder="Task Title">
    <button class="btn btn-primary">Add</button>
</form>


<!-- LIST -->
<ul class="list-group">
<?php foreach ($taches as $t): ?>
<li class="list-group-item d-flex justify-content-between align-items-center
    <?= $t->done ? 'list-group-item-success' : 'list-group-item-warning' ?>">

    <?= htmlspecialchars($t->title) ?>

    <form method="post" class="d-flex gap-2">
        <input type="hidden" name="id" value="<?= $t->id ?>">

        <button name="action" value="toggle" class="btn btn-sm btn-primary">
            <?= $t->done ? 'Undo' : 'Done' ?>
        </button>

        <button name="action" value="delete" class="btn btn-sm btn-danger">
            X
        </button>
    </form>
</li>
<?php endforeach; ?>
</ul>

</div>
</body>
</html>