<?php include 'views/layout/header.php'; ?>

<style>
    /* General page styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        color: #333;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }

    h2 {
        color: light;
        font-size: 1.8rem;
        font-weight: bold;
    }

    /* Card styles */
    .card {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .card-header {
        padding: 15px;
        border-bottom: 1px solid #dee2e6;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px 5px 0 0;
    }

    .card-body {
        padding: 20px;
    }

    .mb-3 {
        margin-bottom: 1rem;
    }

    .form-label {
        margin-bottom: .5rem;
        font-weight: bold;
    }

    .form-control {
        padding: .375rem .75rem;
        border-radius: .25rem;
        border: 1px solid #ced4da;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    /* Button styles */
    .btn-primary {
        background-color: #28a745;
        border-color: #28a745;
        color: #fff;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #218838;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: #fff;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Tambah Pelanggan</h2>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php?page=pelanggan" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>
