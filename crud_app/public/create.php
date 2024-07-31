<?php
include '../config/db.php';
include '../layout/layout.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $stmt = $mysqli->prepare('INSERT INTO students (name, email, age) VALUES (?, ?, ?)');
    $stmt->bind_param('ssi', $name, $email, $age);
    $stmt->execute();
    $stmt->close();


    header('Location: index.php');
    exit;
}
?>

<div class="container mt-4 bg-primary">
    <h2>Add Student</h2><a  href="index.php" class="btn btn-info mb-3 p-2"> View Students</a>

    <form method="post" >
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Student</button>
        

        
    </form>
</div>
