<?php include 'views/layout/header.php'; ?>
<?php 
$header = $data['header']->fetch(PDO::FETCH_ASSOC);
$details = $data['detail'];
?>

<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px; /* Add spacing between cards */
    }
    .card-header {
        background-color: #007bff;
        color: white;
        border-radius: 15px 15px 0 0;
    }
    .card-header h2 {
        margin: 0;
    }
    .card-body {
        padding: 30px;
    }
    .table {
        margin-top: 20px;
    }
    .table th {
        background-color: #e9ecef;
    }
    .btn-custom {
        padding: 10px 20px;
        font-weight: 600;
        text-transform: uppercase;
        border-radius: 30px;
    }
    .text-success {
        color: #28a745 !important; /* Ensures the color is applied */
    }
</style>

<div class="container dashboard-container">
    <div class="card">
        <div class="card-header">
            <h2>Detail Transaksi #<?php echo $header['id']; ?></h2>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Informasi Transaksi</h5>
                    <p>Tanggal: <?php echo date('d/m/Y', strtotime($header['tanggal'])); ?></p>
                    <p>Pelanggan: <?php echo $header['nama_pelanggan']; ?></p>
                </div>
                <div class="col-md-6 text-end">
                    <h5>Total Transaksi</h5>
                    <h3 class="text-success">Rp <?php echo number_format($header['total'], 0, ',', '.'); ?></h3>
                </div>
            </div>

            <h5>Detail Produk</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($detail = $details->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $detail['nama_produk']; ?></td>
                            <td>Rp <?php echo number_format($detail['harga'], 0, ',', '.'); ?></td>
                            <td><?php echo $detail['jumlah']; ?></td>
                            <td>Rp <?php echo number_format($detail['subtotal'], 0, ',', '.'); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <a href="index.php?page=transaksi" class="btn btn-secondary btn-custom">Kembali</a>
        </div>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>

