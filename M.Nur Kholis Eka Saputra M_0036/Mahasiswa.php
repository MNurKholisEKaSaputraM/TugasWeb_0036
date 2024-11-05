<?php
    Class Mahasiswa{
        //properti
        var string $nama;
        var string $nim;
        var string $kelas;

        //construct
        function __construct($nama, $nim, $kelas){
        $this->nama     = $nama;
        $this->nim      = $nim;
        $this->kelas    = $kelas;
    }

        function infoMahasiswa(){
        return "$this->nama,$this->nim,$this->kelas";
        }
    }
?>