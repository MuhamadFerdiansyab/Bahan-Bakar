<?php
//sediakan kotak pembukus yang akan digunakan (sesuai dengan fitur)
class DataBahanBakar {
    private $HargaSSuper;
    private $HargaSVPower;
    private $HargaSVPowerDiesel;
    private $HargaSVPowerNitro;
//attr (attribute) harga2 dibuat private karena sudah ada getter yang akan menampilkan datanya
    public $jenisYangDipilih;
    public $totalLiter;
//attr diata di set public karena nilainya akan di isi dari luar
    protected $totalPembayaran;
//set protected karena hanya digunakan oleh class dia dan turunan untuk proses data


public function setHarga($valSSuper, $valSVPower, $valSVPowerDiesel, $valSVPowerNitro) {
    //mengisi nilai ke stribut, nilai nantinya diisi dari luar class melaluifunction
    //nilai dari luar diambil kedalam class melalui parameter (variable yang ada di )
    //penamaan parameter bebas asal urutan pengisian dari luar sesuai
    $this -> HargaSSuper = $valSSuper;
    $this -> HargaSVPower = $valSVPower;
    $this -> HargaSVPowerDIesel = $valSVPowerDiesel;
    $this -> HargaSVPowerNitro = $valSVPowerNitro;
}

public function getHarga() {
    //setelah nilai attribute disimpan, fungsi getter akan mengembalikan/menampilkannya untuk digunakan ditempat lain
    //karna data yang akan dikirim/dikeluarkan ebih dari satu, maka data2 tersebut disatukan telebih dahulu
    $semuaDataSolar["SSuper"] = $this->HargaSSuper;
    $semuaDataSolar["SVPower"] = $this->HargaSVPower;
    $semuaDataSolar["SVPowerDiesel"] = $this->HargaSVPowerDiesel;
    $semuaDataSolar["SVPowerNitro"] = $this->HargaSVPowerNitro;
    //tujuan utama dari getter : return
    return $semuaDataSolar;
    }
}

class Pembelian extends DataBahanBakar {
    // data sudah disediakan, tinggal proses penghitungan jumlah pembelian
    public function totalHarga() {
        $this->totalPembayaran = $this->getHarga()[$this->jenisYangDipilih] * $this->totalLiter;
    }

    public function cetakBukti() {
        echo "----------------------------------";
        echo "Jenis Bahan Bakar : " . $this->jenisYangDipilih;
        echo "Total Liter : " . $this->totalLiter;
        echo "Harga Bayar : " . number_format($this->totalPembayaran, 0,',', '.');
        echo "----------------------------------";
    }
}
?>