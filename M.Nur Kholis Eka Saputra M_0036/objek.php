<?php
    require_once "Mahasiswa.php";

    $mahasiswaSatu  = new Mahasiswa("Kholis","23.230.0036","3P52");
    $mahasiswaSatu->nama    = "Kholis";
    $mahasiswaSatu->nim     = "23.230.0036";
    $mahasiswaSatu->kelas   = "3P52";

    echo "NAMA    : $mahasiswaSatu->nama    <br>";
    echo "NIM     : $mahasiswaSatu->nim     <br>";
    echo "KELAS   : $mahasiswaSatu->kelas   <br>";
    echo $mahasiswaSatu->infoMahasiswa();
    echo "<br>";
    var_dump($mahasiswaSatu);

    echo "<br>";

    $mahasiswaDua = new mahasiswa("Saputra","23.230.0036","3P52");
    $mahasiswaDua->nama     = "Saputra";
    $mahasiswaDua->nim      = "23.230.0036";
    $mahasiswaDua->kelas    = "3P52";

    echo "NAMA    : $mahasiswaDua->nama    <br>";
    echo "NIM     : $mahasiswaDua->nim     <br>";
    echo "KELAS   : $mahasiswaDua->kelas   <br>";
    echo $mahasiswaDua->infoMahasiswa();
    echo "<br>";
    var_dump($mahasiswaDua);
?>
    