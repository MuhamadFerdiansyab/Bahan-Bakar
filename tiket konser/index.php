<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung Harga Dengan Konsep OOP</title>
</head>
<body>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="tiket">Masukkan Jumlah Tiket : </label>
            <input type="number" name="tiket" id ="tiket" required>
        </div>
        <div style="display: flex;>
            <label for="jenis">Pilih Jenis Tiket Konser</label>
            <select name="jenis" required>
                <option value="Silver">Silver</option>
                <option value="Platinum">Platinum</option>
                <option value="Premium">Premium</option>
                <option value="VIP">VIP</option>
            </select>

        </div>
        <button type="submit" name="beli">Beli</button>
    </form>
    

    <?php 
        require 'tiket.php';
        $logic = new Bayar();
        $logic->setHarga(700000,1300000,2000000,2700000);
        
        if(isset($_POST['beli'])) {
            $logic->jenisYangDipilih = $_POST['jenis'];
            $logic->totalTiket = $_POST['tiket'];
            // abis kirim nilai form, proses harganya
            $logic->totalHarga();
            // cetak hasilnya
            $logic->cetakBukti();
        }
    ?>
    
</body>
</html>
