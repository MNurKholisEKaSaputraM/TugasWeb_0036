<?php
require_once 'config/Database.php';
require_once 'controllers/ProdukController.php';
require_once 'controllers/PelangganController.php';
require_once 'controllers/TransaksiController.php';
require_once 'controllers/DashboardController.php';
require_once 'models/Produk.php';
require_once 'models/Pelanggan.php';
require_once 'models/Transaksi.php';

$database = new Database();
$db = $database->getConnection();

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch($page) {
    case 'dashboard':
        $controller = new DashboardController($db);
        break;
    case 'produk':
        $controller = new ProdukController($db);
        break;
    case 'pelanggan':
        $controller = new PelangganController($db);
        break;
    case 'transaksi':
        $controller = new TransaksiController($db);
        break;
    default:
        $controller = new DashboardController($db);
}

$controller->$action();