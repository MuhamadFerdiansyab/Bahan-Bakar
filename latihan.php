<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data siswa</title>
</head>
<body>
<form  action="" method="post">
    <table align="center">
    <tr>
    <td><label for="nama">Nama : </label></td>
    <td><input type="text" id ="nama" name="nama" ></td>
    </tr>
    <tr>
    <td><label for="Nis">Nis : </label></td>
    <td><input type="number" id="nis" name="nis"></td>
    </tr>
    <tr>
    <td><label for="rayon">Rayon : </label></td>
    <td><input type="text" id="rayon" name="rayon"></td>
    </tr>
    <tr>
    <td><input type="submit"  name="kirim" value="Tambah"></td>
    <td><a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a></td>
    </tr>
</table>
<br>
</form>

<?php
session_start();
if(!isset($_SESSION['datastudent'])) {
    $_SESSION['datastudent'] = array();
}
if(isset($_POST['kirim'])){
    if(!empty($_POST['nama']) && !empty($_POST['nis']) && !empty($_POST['rayon'])){
        $data = [
            'nama' => $_POST['nama'],
            'nis' => $_POST['nis'],
            'rayon' => $_POST['rayon'],
];
array_push($_SESSION['datastudent'], $data);
    }};
    echo '<hr>';
if(isset($_GET['hapus'])){
    $key = $_GET['hapus'];
    unset($_SESSION['datastudent'][$key]);
    header("Location: latihan.php");
    exit;
}
if(!empty($_SESSION['datastudent'])){
    foreach($_SESSION['datastudent'] as $key => $value){
    echo "nama : " . $value['nama'] . '<br>';
    echo "nis : " . $value['nis'] . '<br>';
    echo "rayon : " . $value['rayon'] . '<br>';
    echo '<a href="?hapus=' . $key . '">HAPUS</a>';
    echo '<hr>';
    }
}
?>

</body>
</html>