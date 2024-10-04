<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Diskon Belanja</title>

    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center">Perhitungan Diskon Belanja</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="perhitunganbelanja.php">
                    <div class="form-group mb-3">
                        <label for="amount">Total Belanja (Rp)</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="member">Apakah Anda Member?</label>
                        <select class="form-control" id="member" name="member" required>
                            <option value="yes">Ya</option>
                            <option value="no">Tidak</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Hitung Total</button>
                </form>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $amount = $_POST['amount'];
                    $isMember = $_POST['member'] == "yes";
                    $discount = 0;

                    if ($isMember) {
                        // Member discount rules
                        if ($amount > 1000000) {
                            $discount = 0.15; // 15% discount if amount > 1.000.000
                        } elseif ($amount >= 500000) {
                            $discount = 0.10; // 10% discount if amount >= 500.000
                        } else {
                            $discount = 0.10; // 10% member discount for all amounts below 500.000
                        }
                    } else {
                        // Non-member discount rules
                        if ($amount >= 1000000) {
                            $discount = 0.10; // 10% discount if amount > 1.000.000
                        } elseif ($amount >= 500000) {
                            $discount = 0.05; // 5% discount if amount >= 500.000
                        }
                    }

                    $discountAmount = $amount * $discount;
                    $totalAmount = $amount - $discountAmount;

                    echo "
                        <div class='alert alert-info'>
                            <h4>Total Belanja: Rp " . number_format($amount, 0, ',', '.') . "</h4>
                            <p>Diskon: Rp " . number_format($discountAmount, 0, ',', '.') . " (" . ($discount * 100) . "%)</p>
                            <h5>Total Setelah Diskon: Rp " . number_format($totalAmount, 0, ',', '.') . "</h5>
                        </div>
                    ";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>