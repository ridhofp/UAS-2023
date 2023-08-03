<!-- <?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// var_dump($_POST);

if(isset($_POST['tombol']) && $_POST['tombol']=='table_posting'){

    $judul_posting = $_POST['table_posting'];
    
    // Set up cURL
    $curl = curl_init();

    // Build the data for the POST request
    $data = [
        "aksi" => "tambah",
        "tabel" => "posting",
        "judul_posting" => $judul_posting, // Use the $judul_posting variable here
    ];
    
    // Convert the data array to JSON
    $jsonData = json_encode($data);

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:8080/api.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $jsonData, // Use the $jsonData here
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);

    if(curl_error($curl)){
        echo 'Error:' . curl_error($curl);
    }

    curl_close($curl);
}
?> -->

<?php
if($_POST['tombol']=='posting'){

    // Mengambil data dari form
    $judul_posting = $_POST['posting'];
    $tgl_posting = date('Y-m-d H:i:s');

    // Membuat koneksi ke database
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'uas-2023';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Mengecek koneksi
    if ($conn->connect_error) {
        die('Error: Failed to connect to database: ' . $conn->connect_error);
    }

    // Membuat query SQL
    $sql = "INSERT INTO table_posting (judul_posting, tgl_posting) VALUES ('$judul_posting', '$tgl_posting')";

    // Menjalankan query dan mengecek apakah berhasil
    if ($conn->query($sql) === TRUE) {
        echo 'New record created successfully';

        // Jika berhasil, lakukan query SELECT untuk memverifikasi data telah masuk
        $sql = "SELECT * FROM table_posting WHERE judul_posting='$judul_posting'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data dari setiap baris
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id_posting"]. " - Judul Posting: " . $row["judul_posting"]. "<br>";
            }
        } else {
            echo "0 results";
        }

    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
}
?>
