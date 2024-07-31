<?php
include '../config/db.php';
include '../layout/layout.php';
// Fetch all students
$result = $mysqli->query('SELECT * FROM students');
?>

<div class="container mt-4">
    <h2>Student List</h2>
    <a href="create.php" class="btn btn-primary mb-3">Add Student</a>
    <table class="table table-striped table-bordered">
        <thead class="table-dark ">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($student = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $student['id']?></td>
                    <td><?php echo $student['name']?></td>
                    <td><?php echo $student['email']?></td>
                    <td><?php echo $student['age']?></td>


                    
                    <td>
                        <a href="update.php?id=<?= $student['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $student['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
