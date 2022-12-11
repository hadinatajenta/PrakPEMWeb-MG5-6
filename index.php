<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Tugas Minggu 5</h1>
        <p>Membuat web yang dapat menampilkan data mahasiswa ketika pengguna melakukan
perubahan pada pilihan program studi yang tersedia menggunakan bantuan AJAX.</p>
    </header>
    <div class="topnav">
        <a href="./index.php">Tugas Minggu 5</a>
        <a href="./tugas6.php">Tugas Minggu 6</a>
        
    </div>
    <div class="row">
        
        <div class="column">
            <form  method="post">
                <h1>Masukkan data</h1>
               
                <input type="text" name="nama" id="nama" placeholder="masukkan nama" required>
                <input type="text" name="nim" id="nim" placeholder="masukkan nim" required>
                <input type="text" name="prodi" id="prodi" placeholder="masukkan podi" required>
                <input type="submit" name="submit" value="Tambah Data">
            </form>
            <?php
    
                // Menyertakan file connection.php
                include("./koneksi.php");
    
    
                if (isset($_POST["submit"])) {
                    // Mengambil input dari form
                    $nama = $_POST["nama"];
                    $nim = $_POST["nim"];
                    $prodi = $_POST["prodi"];
    
                    // Menambah data ke database
                    $sql = "INSERT INTO mahasiswa (nama, nim, prodi) VALUES ('$nama', '$nim','$prodi')";
                    if (mysqli_query($conn, $sql)) {
                        // Jika data berhasil disimpan, tampilkan pesan sukses
                        echo "Data berhasil disimpan.";
                    } else {
                        // Jika error, tampilkan pesan error
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            ?>
            
        </div>
        <div class="column">
            <form class="cari" method="GET" >
                <table>
                    <tr>
                        <td><label for="prodi">Cari Berdasarkan Prodi</label></td>
                        <td>
                            <select id="prodi" name="prodi">
                                <option value=""></option>
                                <option value="informatika">informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                                <option value="Sistem Komputer">Sistem Komputer</option>
                                <option value="Manajemen Informatika">Manajemen Informatika</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Tampilkan"></td>
                    </tr>
                </table>
                
                
            </form>
            <?php
            if (isset($_GET["prodi"])) {
                // Menyimpan parameter prodi ke dalam variabel
                $prodi = $_GET["prodi"];

                // Mempersiapkan perintah SQL untuk menampilkan data dari tabel mahasiswa berdasarkan prodi
                $sql = "SELECT * FROM `mahasiswa` WHERE `prodi` = '$prodi'";
                
            }else {
                // Mempersiapkan perintah SQL untuk menampilkan data dari tabel mahasiswa
                $sql = "SELECT * FROM mahasiswa";
            }
            ?>
            <table id="mahasiswa">
                <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Prodi</th>
                </tr>
                <?php 
                    
                    $result = mysqli_query($conn, $sql);
                    $i = 0;

                    while ($data = mysqli_fetch_array($result)) :
                    $i++;
                ?>
                <tr>
                    <td> <?= $i ?> </td>
                    <td> <?= $data["nama"] ?> </td>
                    <td> <?= $data["nim"] ?> </td>
                    <td> <?= $data["prodi"] ?> </td>
                </tr>
                <?php
                endwhile
                ?>
            </table>
           
        </div>
    </div>
</body>

</html>