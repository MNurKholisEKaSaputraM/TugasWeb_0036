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

    .form-select {
        padding: .375rem .75rem;
        border-radius: .25rem;
        border: 1px solid #ced4da;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Tambah Transaksi</h2>
        </div>
        <div class="card-body">
            <form method="POST" id="transaksiForm">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pelanggan_id" class="form-label">Pelanggan</label>
                        <select class="form-select" name="pelanggan_id" required>
                            <option value="">Pilih Pelanggan</option>
                            <?php while ($pelanggan = $pelanggan_data->fetch(PDO::FETCH_ASSOC)): ?>
                                <option value="<?php echo htmlspecialchars($pelanggan['id']); ?>">
                                    <?php echo htmlspecialchars($pelanggan['nama']); ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" required value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <h4>Detail Produk</h4>
                    <div id="produkContainer">
                        <div class="row mb-2 produk-row">
                            <div class="col-md-4">
                                <select class="form-select produk-select" name="produk_id[]" required>
                                    <option value="">Pilih Produk</option>
                                    <?php
                                    while ($produk = $produk_data->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<option value="' . htmlspecialchars($produk['id']) . '" data-harga="' . htmlspecialchars($produk['harga']) . '" data-stok="' . htmlspecialchars($produk['stok']) . '">' . htmlspecialchars($produk['nama']) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control jumlah" name="jumlah[]" min="1" placeholder="Jumlah" required>
                            </div>
                            <div class="col-md-3">
                                <input type="number" class="form-control harga" name="harga[]" readonly>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control subtotal" readonly>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger btn-remove">X</button>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" id="addProduk">Tambah Produk</button>
                </div>

                <div class="mb-3">
                    <h4>Total: <span id="totalTransaksi">0</span></h4>
                    <input type="hidden" name="total" id="totalInput">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php?page=transaksi" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('produkContainer');
        const addButton = document.getElementById('addProduk');
        const totalSpan = document.getElementById('totalTransaksi');
        const totalInput = document.getElementById('totalInput');
        const produkTemplate = container.querySelector('.produk-row');

        // Add new product row
        addButton.addEventListener('click', function() {
            const newRow = produkTemplate.cloneNode(true);
            setupRow(newRow);
            container.appendChild(newRow);
        });

        // Setup initial row
        setupRow(container.querySelector('.produk-row'));

        function setupRow(row) {
            const select = row.querySelector('.produk-select');
            const jumlah = row.querySelector('.jumlah');
            const harga = row.querySelector('.harga');
            const subtotal = row.querySelector('.subtotal');
            const removeBtn = row.querySelector('.btn-remove');

            select.addEventListener('change', function() {
                const option = this.options[this.selectedIndex];
                harga.value = option.dataset.harga || '';
                calculateSubtotal();
            });

            jumlah.addEventListener('input', calculateSubtotal);

            removeBtn.addEventListener('click', function() {
                if (container.children.length > 1) {
                    row.remove();
                    calculateTotal();
                }
            });

            function calculateSubtotal() {
                const qty = parseFloat(jumlah.value) || 0;
                const price = parseFloat(harga.value) || 0;
                subtotal.value = qty * price;
                calculateTotal();
            }
        }

        function calculateTotal() {
            let total = 0;
            container.querySelectorAll('.subtotal').forEach(function(el) {
                total += parseFloat(el.value) || 0;
            });
            totalSpan.textContent = total.toLocaleString('id-ID');
            totalInput.value = total;
        }
    });
</script>

<?php include 'views/layout/footer.php'; ?>
