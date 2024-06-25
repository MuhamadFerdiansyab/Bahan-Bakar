<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Bakar</title>
</head>
<body>
    <form action="" method="post">
        <label for="liter">Masukkan jumlah liter</label>
        <input  name="liter" id="liter" type="number">
        <br>
        <label for="bb">Pilih tipe bahan bakar</label>
        <select name="bb" id="bb">
            <option value="Shell Super">Shell Super</option>
            <option value="Shell V-Power">Shell V-Power</option>
            <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
            <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
        </select>
        <br>
        <input name="kirim" type="submit">

    </form>
</body>
</html>
<?php
class Shell {
    protected $ppn= 0.1;
    protected $super= 15420;
    protected $power= 16130;
    protected $powerDiesel= 18310;
    protected $powerNitro= 16510;
}
class Beli extends Shell{
    public function setBukti ( $harga, $liter) {
        $hasil= $harga * $liter + ($harga * $liter * $this -> ppn);
        echo "Anda membeli bahan bakar minyak tipe <b>" . $_POST["bb"] . "<br></b>";
        echo "Dengan jumlah:    <b>" . $_POST["liter"] . "<br></b>";
        echo "Total yang harus anda bayar <b>Rp." . number_format($hasil, 2, ",", ".") . "</b>";
    }
    public function getBukti (){
        if (isset($_POST["kirim"])) {
            $liter = $_POST["liter"];
            $tipe = $_POST["bb"];

            if (!is_numeric($liter)||(empty($tipe))) {
                echo "ISI ATUH";
            }
            else {
                $total = new Beli ();

                if ($tipe == "Shell Super"){
                    $harga = $total -> super;
                } elseif ($tipe == "Shell V-Power") {
                    $harga = $total -> power;
                } elseif ($tipe == "Shell V-Power Diesel"){
                    $harga = $total -> powerDiesel;
                } elseif ($tipe == "Shell V-Power Nitro"){
                    $harga = $total -> powerNitro;
                } else {
                    $harga = 0;
                } $total -> setBukti ($harga, $liter);
                
            }
        }
    
    }
}
$hitung =new Beli ();
echo $hitung -> getBukti ();
?>