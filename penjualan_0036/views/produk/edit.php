<?php include 'views/layout/header.php'; ?>
<?php $produk = $data->fetch(PDO::FETCH_ASSOC); ?>

<style>
    /* General page and card styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        color: #333;
    }

    .container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
    }

    .card {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin-top: 20px;
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        padding: 15px;
        font-size: 1.5rem;
        font-weight: bold;
        text-align: center;
    }

    .card-body {
        padding: 20px;
    }

    /* Form styles */
    .form-label {
        font-weight: bold;
    }

    .form-control {
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 5px;
        margin-bottom: 1rem;
    }

    .mb-3 {
        margin-bottom: 1.5rem;
    }

    /* Button styles */
    .btn-primary {
        background-color: #28a745;
        border-color: #28a745;
        color: #fff;
        padding: 10px 16px;
        text-decoration: none;
        border-radius: 5px;
    }

    .btn-primary:hover {
        background-color: #218838;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        color: #fff;
        padding: 10px 16px;
        text-decoration: none;
        border-radius: 5px;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Edit Produk</h2>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($produk['nama']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?php echo htmlspecialchars($produk['harga']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="<?php echo htmlspecialchars($produk['stok']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="index.php?page=produk" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>
