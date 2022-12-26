<?php 
error_reporting(E_ALL); 
include_once 'koneksi.php'; 

if (isset($_POST['submit'])) 

$id = isset($_GET['id']) ? $_GET['id'] :''; 
$id = !empty($_GET['id']) ? $_GET['id'] :'';
$sql = "SELECT * FROM data_barang WHERE id_barang = '{$id}'"; 
$result = mysqli_query($conn, $sql); 
if (!$result) die('Error: Data tidak tersedia'); 
$data = mysqli_fetch_array($result); 

function is_select($var, $val) { 
    if ($var == $val) return 'selected="selected"'; 
    return false; 
} 

    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Ubah Barang</title>
</head>
<body>
<div class="container">
    <h1>Ubah Barang</h1>
    <div class="main">
        <form method="post" action="ubah.php"
enctype="multipart/form-data">
            <div class="input">
                <label>Nama Barang</label>
                <input type="text" name="Nama" value="<?php echo
(isset($data['Nama']) ? $data['Nama'] : '');;?>" />
            </div>
            <div class="input">
            <label>Kategori</label>
 <select name="kategori">
 <option <?php echo is_select
('Komputer', $data['kategori']);?> value="Komputer">Komputer</option>
 <option <?php echo is_select
('Komputer', $data['kategori']);?> value="Elektronik">Elektronik</option>
 <option <?php echo is_select
('Komputer', $data['kategori']);?> value="Hand Phone">Hand Phone</option>
 </select>
            </div>
            <div class="input">
                <label>Harga Jual</label>
                <input type="text" name="Harga_Jual" value="<?php echo
(isset($data['Harga_jual']) ? $data['Harga_Jual'] : '');;?>" />
            </div>
            <div class="input">
                <label>Harga Beli</label>
                <input type="text" name="Harga_Beli" value="<?php echo
(isset($data['Harga_Beli']) ? $data['Harga_Beli'] : '');;?>" />
            </div>
            <div class="input">
                <label>Stok</label>
                <input type="text" name="Stok" value="<?php echo
(isset($data['Stock']) ? $data['Stok'] : '');;?>" />
            </div>
            <div class="input">
                <label>File Gambar</label>
                <input type="file" name="file_gambar" />
            </div>
            <div class="submit">
            <input type="hidden" name="id" value="<?php echo
(isset($data['Id_barang']) ? $data['Id_Barang'] : '');;?>" />
                <input type="submit" name="submit" value="Simpan" />
            </div>
        </form>
    </div>
</div>
</body>
</html>