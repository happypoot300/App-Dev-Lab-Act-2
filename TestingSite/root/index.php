<?php
try {
    require_once "../root/scripts/dbh_inc.php";

    $query = "SELECT * FROM tasks_tbl";

    $stmt = $pdo->prepare($query);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //manual close of statement and connection to db
    $stmt = null;
    $pdo = null;
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fontawesome-->
    <script src="https://kit.fontawesome.com/76890dc9bd.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/index.css?v=<?php echo time(); ?>">
    <title>TaskM</title>
</head>

<body>
    <section class="wrapper">
        <header>
            <div class="header__logo">
                <h1>Task Management</h1>
                <div class="header__imgIcon"></div>
            </div>

            <nav class="header__nav">
            </nav>
        </header>

        <section class="body__tableWrapper">
            <div class="body__container">
                <p>All Tasks</p>
                <a href="pages/forms/add_task_form.php"><button class="button__addtask">+ ADD TASK</button></a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Tasks</th>
                        <th>Tag</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>Due Date</th>
                        <th>Priority</th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                if (empty($result)) {
                    echo "<p class='no-task-message'>There is no pending task at the moment.</p>";
                } else {
                    foreach ($result as $row) {
                        echo "<tr>";
                        echo "<td><input type='checkbox'></td>";
                        echo "<td>" . htmlspecialchars($row["task_title"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["tag"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["start_date"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["end_date"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["priority"]) . "</td>";

                        echo "<td> <a href='pages/forms/update_task_form.php?id=" . $row["id"] . "'><i class='fa-solid fa-ellipsis-vertical fa-xl'></i></a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>

        </section>
    </section>

</body>

</html>