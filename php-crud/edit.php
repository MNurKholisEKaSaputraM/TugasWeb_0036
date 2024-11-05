<?php
include 'database.php';
$db = new Database;
// var_dump($db->editData($_GET['id'])); menguji fungsi edit untuk melihat data berdasarkan id 
$detail = $db->editData($_GET['id']);
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, intial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
        <body>
            <div class="container mt-3">
                <!-- menambahkan teks judul -->
                 <h1>OOP PHP CRUD</h1>
                 <h4>Edit Data</h4>
                 <hr class="mt-0">
                 <!-- membuat form update data user -->
                  <form method="POST" action="proses.php?aksi=update" enctype="multipart/form-data">
                    <?php
                    foreach ($detail as $dataUser){
                        ?>
                    <input type="hidden" name="id" value="<?php echo $dataUser['id'] ?>">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $dataUser['nama'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"><?php echo $dataUser['alamat'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nohp" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo $dataUser['nohp'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label><br>
                        <input type="radio" id="laki" name="jenis_kelamin" value="Laki-laki" required>
                        <label for="laki">Laki-laki</label>
                        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
                        <label for="perempuan">Perempuan</label>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                <?php
                    }
                    ?>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </body>
    </html>