<?php
include 'database.php';
$db = new Database;
$detail = $db->editData($_GET['id']); 
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <h1>User Detail</h1>
        <hr>

        <?php
        foreach ($detail as $dataUser) {
            ?>
            <div class="card" style="width: 18rem;">
                <img src="uploads/<?php echo $dataUser['foto']; ?>" class="card-img-top" alt="User Photo">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $dataUser['nama']; ?></h5>
                    <p class="card-text">
                        <strong>Jenis Kelamin:</strong> <?php echo $dataUser['jenis_kelamin']; ?><br>
                        <strong>No HP:</strong> <?php echo $dataUser['nohp']; ?><br>
                        <strong>Email:</strong> <?php echo $dataUser['email']; ?><br>
                        <strong>Alamat:</strong> <?php echo $dataUser['alamat']; ?>
                    </p>
                    <a href="index.php" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLEaAA55NDzOxhy9GkcIdslk1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>