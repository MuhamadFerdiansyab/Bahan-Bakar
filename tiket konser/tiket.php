<?php

class Tiket {
    private $HargaSilver;
    private $HargaPlatinum;
    private $HargaPremium;
    private $HargaVIP;
    
    public $jenisYangDipilih;
    public $totalTiket;
    
    protected $pajak;
    protected $totalPembayaran;

    function __construct(){
        $this->pajak = 0.1;
    }

    public function setHarga($valSilver, $valPlatinum, $valPremium, $valVIP) {
        $this->HargaSilver = $valSilver;
        $this->HargaPlatinum = $valPlatinum;
        $this->HargaPremium = $valPremium;
        $this->HargaVIP = $valVIP;
    }

    public function getHarga(){
        $semuaDataTiket["Silver"] = $this->HargaSilver;
        $semuaDataTiket["Platinum"] = $this->HargaPlatinum;
        $semuaDataTiket["Premium"] = $this->HargaPremium;
        $semuaDataTiket["VIP"] = $this->HargaVIP;
        return $semuaDataTiket;
    }
}

class Bayar extends Tiket {
    public function totalHarga() {
        if (!isset($this->getHarga()[$this->jenisYangDipilih])) {
            echo "Jenis tiket tidak valid.";
            return;
        }
        
        $hargaTiket = $this->getHarga()[$this->jenisYangDipilih];
        $totalTanpaPajak = $hargaTiket * $this->totalTiket;
        $this->totalPembayaran = $totalTanpaPajak + ($totalTanpaPajak * $this->pajak);
    }

    public function cetakBukti() {
        echo "----------------------------------";
        echo "<br>";
        echo " Anda membeli tiket dengan class " . $this->jenisYangDipilih;
        echo "<br>";
        echo " Sebanyak   " . $this->totalTiket . " tiket";
        echo "<br>";
        echo " Total yang harus anda bayar RP. " . number_format($this->totalPembayaran, 0,',', '.');
        echo "<br>";
        echo "----------------------------------";
    }

}

?>