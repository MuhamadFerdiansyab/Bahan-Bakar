<?php 
class motor {
	protected $pajak,
			$diskon = 0.05;
	private $RxKing,
			$Zx25R,
			$Vario150,
			$Vesmet;
	public $waktu,
		$jenis,
		$member;

	function __construct() {
		$this->pajak = 10000;
		$this->diskon = 0.05;
		$this->member = ['ferdi','pandu','radit'];
	}

	public function setHarga($tipe1, $tipe2, $tipe3, $tipe4) {
		$this->RxKing = $tipe1;
		$this->Zx25R = $tipe2;
		$this->Vario = $tipe3;
		$this->Vesmet = $tipe4;
	}

	public function getHarga() {
		$data["RxKing"] = $this->RxKing;
		$data["Zx25R"] = $this->Zx25R;
		$data["Vario"] = $this->Vario;
		$data["Vesmet"] = $this->Vesmet;
		return $data;
	}

	public function isMember($nama) {
		return in_array($nama, $this->member);
	}
}

class sewa extends motor {
	public function hargaSewa() {
		$nama = $_POST['nama'];
		if ($_POST['nama'] == $this->isMember($nama)) {
			$dataHarga = $this->getHarga();
			$hargaPajak = $dataHarga[$this->jenis] + $this->pajak;
            $hargaSewa = $this->waktu * $hargaPajak;
            $hargaPajakDiskon =  $this->diskon * $hargaSewa;
            $hargaBayar = $hargaSewa - $hargaPajakDiskon;
            return $hargaBayar;
		} else {
			$dataHarga = $this->getHarga();
			$hargaPajak = $dataHarga[$this->jenis] + $this->pajak ;
			$hargaBayar = $hargaPajak * $this->waktu;
			return $hargaBayar;
		}
	}

	public function cetakStruck() {
		$nama = $_POST['nama'];
		if ($_POST['nama']  == $this->isMember($nama)) {
			echo "<center>";
			echo "-----------------------------------------------" . "<br>";
			echo "Anda menyewa motor " . $this->jenis . "<br>";
			echo "Dengan lama waktu : " . $this->waktu . " hari <br>";
			echo "Nama anda tercatat sebagai member dan anda mendapatkan diskon sebesar 5%" . "<br>";
			echo "Total yang harus anda bayar Rp. " . number_format($this->hargaSewa(), 0, '', '.') . "<br>";
			echo "-----------------------------------------------";
			echo "</center>";	
		}else {
			echo "<center>";
			echo "-----------------------------------------------" . "<br>";
			echo "Anda menyewa motor " . $this->jenis . "<br>";
			echo "Dengan lama waktu : " . $this->waktu . " hari <br>";
			echo "Total yang harus anda bayar Rp. " . number_format($this->hargaSewa(), 0, '', '.') . "<br>";
			echo "-----------------------------------------------";
			echo "</center>";	
		}
	} 
}
?>