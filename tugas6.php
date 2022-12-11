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
        <h1>Tugas Minggu 6</h1>
        <p>Membuat program yang mengubah bilangan menjadi romawi</p>
    </header>
    <div class="topnav">
        <a href="./index.php">Tugas Minggu 5</a>
        <a href="./tugas6.php">Tugas Minggu 6</a>
        
    </div>
    <div class="row">
        
        <div class="column">
            <h1>Menampilkan bilangan </h1>
            <?php
            function convertToRoman($num)
            {
                $numerals = array(
                    'M' => 1000,
                    'CM' => 900,
                    'D' => 500,
                    'CD' => 400,
                    'C' => 100,
                    'XC' => 90,
                    'L' => 50,
                    'XL' => 40,
                    'X' => 10,
                    'IX' => 9,
                    'V' => 5,
                    'IV' => 4,
                    'I' => 1
                );

                $result = '';

                foreach ($numerals as $roman => $value) {
                    // jumlah maksimum kali pengulangan setiap simbol Romawi
                    $matches = intval($num / $value);

                    // tambahkan simbol Romawi ke string hasil
                    $result .= str_repeat($roman, $matches);

                    // kurangi bilangan dengan nilai simbol Romawi yang sudah ditambahkan
                    $num = $num % $value;
                }

                return $result;
            }

            ?>
            <form  method="post">
                <label for="bilangan">Masukkan bilangan:</label><br>
                <input type="text" id="bilangan" name="bilangan"><br><br>
                <input type="submit" value="Kirim">
            </form>

            <?php

            // ambil input dari form
            $num = $_POST['bilangan'];

            // ubah bilangan menjadi notasi Romawi
            $roman = convertToRoman($num);

            // tampilkan hasil
            echo "Notasi Romawi: $roman";
            ?>
        </div>
        
    </div>
</body>

</html>

