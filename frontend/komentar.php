<?php
if($_POST['tombol'] == 'komentar'){

    // Mendapatkan data dari form
    $komentar = $_POST['komentar'];
    $id_posting = $_POST['id_posting']; // Menambahkan ini

    // Membuat koneksi ke database
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'uas-2023';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Mengecek koneksi
    if ($conn->connect_error) {
        die('Failed to connect to the database: ' . $conn->connect_error);
    }

    // Membuat query SQL
    $sql = "INSERT INTO table_komentar (komentar, id_posting) VALUES ('$komentar', '$id_posting')"; // Menambahkan id_posting

    // Menjalankan query dan mengecek apakah berhasil
    if ($conn->query($sql) === TRUE) {
        echo 'Komentar berhasil disimpan';
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
}
?>

<a href="index.php" class="btn btn-primary">Kembali</a>


