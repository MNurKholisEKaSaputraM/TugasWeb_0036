<?php
include 'database.php';
$db = new Database();
$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
    $foto = $_FILES['foto']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);

    move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);

    $db->tambahData($_POST['nama'], $_POST['alamat'], $_POST['nohp'], $_POST['jenis_kelamin'], $_POST['email'], $foto);
    header("location:index.php");
} elseif ($aksi == "update") {
    $foto = $_FILES['foto']['name'];
    if ($foto != "") {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($foto);
        move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
    } else {
        $foto = $_POST['foto_lama'];
    }

    $db->updateData($_POST['id'], $_POST['nama'], $_POST['alamat'], $_POST['nohp'], $_POST['jenis_kelamin'], $_POST['email'], $foto);
    header("location:index.php");
} elseif ($aksi == "hapus") {
    $db->hapusData($_GET['id']);
    header("location:index.php");
}