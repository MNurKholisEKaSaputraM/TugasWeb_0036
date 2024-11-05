<?php
    Class Mobil {
        public $nama;
        public $merk;
    
    public function __construct($nama, $merk) {
        $this->nama = $nama;
        $this->merk = $merk;
    }

    public function cetakInfo() {
        echo "Nama Mobil: $this->nama\n";
        echo "Merk Mobil: $this->merk\n";
    }
}

    Class MobilSport extends Mobil {
    public $speed;
    public $turbo;
    
    public function __construct($nama, $merk, $speed, $turbo) {
        parent::__construct($nama, $merk);
        $this->speed = $speed;
        $this->turbo = $turbo;
    }
    
    public function cetakInfo() {
        parent::cetakInfo();
        echo "Speed: $this->speed km/h\n";
        echo "Turbo: $this->turbo\n";
    }
}

    Class CityCar extends Mobil {
    public $model;
    public $irit;
    public $sensor; 

    public function __construct($nama, $merk, $model, $irit, $sensor) {
        parent::__construct($nama, $merk);
        $this->model = $model;
        $this->irit = $irit;
        $this->sensor = $sensor;
    }
    
    public function cetakInfo() {
        parent::cetakInfo();
        echo "Model: $this->model\n";
        echo "Irit: $this->irit\n";
        echo "Sensor: $this->sensor\n";
    }
}

    $mobilSport = new MobilSport("BMW i8", "BMW", 250, "Yes");
    $mobilSport->cetakInfo();

    echo "\n";

    $cityCar = new CityCar("Calya", "Toyota", "G AT", "Sangat Irit", "Bagus");
    $cityCar->cetakInfo();
?>