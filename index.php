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

</body>
</html>