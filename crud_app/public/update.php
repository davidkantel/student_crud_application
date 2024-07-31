<?php
include '../config/db.php';
include '../layout/layout.php';
$id = $_GET['id'];
$stmt = $mysqli->prepare('SELECT * FROM student_crud_table WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $stmt = $mysqli->prepare('UPDATE student_crud_table SET name = ?, email = ?, age = ? WHERE id = ?');
    $stmt->bind_param('ssii', $name, $email, $age, $id);
    $stmt->execute();
    $stmt->close();

    header('Location: index.php');
    exit;
}
?>

<div class="container mt-4">
    <h2>Update Student</h2>
    <form method="post">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($student['name']) ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="<?= htmlspecialchars($student['age']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
</div>
