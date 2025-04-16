<?php

$connect = mysqli_connect("localhost", "root", "", "to_do_app");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>to do app</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/
font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <div class="row bg-dark">
        <ul class="nav">
            <li class="nav-item">
                <a href="index.php" class="nav-link text-white text-decoration-none">Home</a>
            </li>
            <li class="nav-item">
                <a href="manage_task.php" class="nav-link text-white text-decoration-none">Manage tasks</a>
            </li>

        </ul>
    </div>

</body>

</html>