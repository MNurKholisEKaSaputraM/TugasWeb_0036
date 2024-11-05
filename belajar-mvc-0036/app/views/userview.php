<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
}

.card {
    border: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #6c757d;
    color: #fff;
    font-size: 1.5em;
    font-weight: bold;
}

.table thead th {
    background-color: #343a40;
    color: #fff;
}

.table-hover tbody tr:hover {
    background-color: #e9ecef;
}

.btn {
    border-radius: 20px;
    font-weight: bold;
}
/* Fade-in animation for the card */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Apply fade-in animation */
.card {
    animation: fadeIn 0.8s ease-in-out;
    border: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Background and font styles */
body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
}

/* Header styling */
.card-header {
    background-color: #6c757d;
    color: #fff;
    font-size: 1.5em;
    font-weight: bold;
}

/* Table styling */
.table thead th {
    background-color: #343a40;
    color: #fff;
}

/* Row hover effect */
.table-hover tbody tr {
    transition: background-color 0.3s ease;
}

.table-hover tbody tr:hover {
    background-color: #e9ecef;
}

/* Button styling */
.btn {
    border-radius: 20px;
    font-weight: bold;
    transition: transform 0.2s ease;
}

/* Button hover animation */
.btn:hover {
    transform: scale(1.1);
}

/* Simple fade-in effect for table rows */
tbody tr {
    opacity: 0;
    animation: fadeInRow 0.6s forwards;
    animation-delay: calc(0.1s * var(--delay)); /* Delay each row slightly */
}

@keyframes fadeInRow {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Apply delay to each row */
tbody tr:nth-child(1) { --delay: 1; }
tbody tr:nth-child(2) { --delay: 2; }
tbody tr:nth-child(3) { --delay: 3; }

    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h3>User List</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                        <a href="index.php?action=detail&id=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">Detail</a>
<a href="index.php?action=edit&id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="index.php?action=delete&id=<?php echo $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
