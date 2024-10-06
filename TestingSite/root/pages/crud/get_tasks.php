<?php
include 'db.php';

$query = "SELECT * FROM tasks";

$result = $conn->query($query);

if ($result === FALSE) {
    die("Error executing query: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['task_title']}</td>
            <td>{$row['tag']}</td>
            <td>{$row['status']}</td>
            <td>{$row['start_date']}</td>
            <td>{$row['end_date']}</td>
            <td>{$row['priority']}</td>
            <td>
                <a href='update_task_form.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                <a href='delete_task.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this task?')\">Delete</a>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No tasks found</td></tr>";
}

$conn->close();

/*
try {
    require_once "../../scripts/dbh_inc.php";

    $query = "SELECT * FROM tasks";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>{$row['task_title']}</td>
            <td>{$row['tag']}</td>
            <td>{$row['status']}</td>
            <td>{$row['start_date']}</td>
            <td>{$row['end_date']}</td>
            <td>{$row['priority']}</td>
            <td>
                <a href='update_task_form.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                <a href='delete_task.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this task?')\">Delete</a>
            </td>
        </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No tasks found</td></tr>";
    }

    //manual close of statement and connection to db
    $stmt = null;
    $pdo = null;

    //send user back to index.php
    header("Location: ../../index.php");
    die();
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
*/
