<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelompok2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
    <style>
    body {
        font-family: Arial, sans-serif;
        padding: 10px;
        background-color: #f8f9fa;
    }
    h2 {
        color: #343a40;
        text-decoration: underline;
        text-decoration-color: #007BFF;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        transition: all 0.3s;
    }
    table:hover {
        box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
    }
    th {
        border: 2px solid #dee2e6;
        text-align: center;
        padding: 10px;
        background-color: #007BFF;
        color: white;
    }
    td {
        border: 2px solid #dee2e6;
        text-align: center;
        padding: 10px;
    }
    .form-control, .btn {
        margin-top: 10px;
    }
    .form-control:hover, .form-control:focus {
        box-shadow: 0px 0px 5px rgba(0,0,0,0.2);
    }
    .btn {
        transition: all 0.3s;
    }
    .btn:hover {
        transform: scale(1.02);
        box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
    }
    .btn:active {
        transform: scale(1.00);
    }
    .container {
        margin-top: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
        padding: 20px;
        background-color: white;
    }
</style>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm">

    <script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart(negatif, positif, netral) {
    var data = google.visualization.arrayToDataTable([
        ['Sentiment', 'Jumlah'],
        ['Negatif',     negatif],
        ['Positif',      positif],
        ['Netral',  netral]
    ]);

    var options = {
        title: 'Sentiment Analysis',
        is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}
</script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h2>Input Posting</h2>
                <!-- Formulir untuk mengirim data posting -->
                <form method="post" action="http://localhost:8080/frontend/posting.php">
                    <label>Judul Posting</label>
                    <input type="text" name="posting" class="form-control" placeholder="input judul posting"/>
                    <input type="hidden"  name="tombol" value="posting" >
                    <button type="submit" class="btn btn-primary" name="tombol" value="posting">Simpan</button>
                </form>
                <!-- Tabel untuk menampilkan data posting -->
                <h2>Data Posting</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Judul Posting</th>
                            <th>Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Membuat koneksi ke database
                        $servername = 'localhost';
                        $username = 'root';
                        $password = '';
                        $dbname = 'uas-2023';
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if($conn->connect_error) {
                            die("Error connecting to database: " . mysqli_error_string($conn));
                        }
                        // Membuat query SQL
                        $sql = "SELECT id_posting, judul_posting FROM table_posting";
                        // Menjalankan query dan mengecek apakah berhasil
                        if ($result = $conn->query($sql)) {
                            // Mencetak semua data posting
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row['judul_posting'] . '</td>';
                                echo '<td>';
                                echo '<form method="post" action="http://localhost:8080/frontend/komentar.php">';
                                echo '<input type="hidden" name="id_posting" value="' . $row['id_posting'] . '">';
                                echo '<textarea name="komentar" class="form-control" placeholder="Tulis komentar Anda di sini"></textarea>';
                                echo '<input type="hidden" name="tombol" value="komentar" >';
                                echo '<button type="submit" class="btn btn-secondary" name="tombol" value="komentar">Kirim Komentar</button>';
                                echo '</form>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            // Membersihkan hasil set
                            $result->free();
                        } else {
                            echo 'Error: ' . $sql . '<br>' . $conn->error;
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                require_once __DIR__ . '/../autoload.php';
                $sentiment = new \PHPInsight\Sentiment();
                error_reporting(0);
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $dbname = 'uas-2023';
                $conn = new mysqli($servername, $username, $password, $dbname);
                if($conn->connect_error) {
                    die("Error connecting to database: " . mysqli_error_string($conn));
                }
                $query = $conn->query("SELECT * FROM table_posting");
                ?>
                <table style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th style="border: 2px solid black; text-align: center;">No</th>
                            <th style="border: 2px solid black; text-align: center;">Judul Posting</th>
                            <th style="border: 2px solid black; text-align: center;">Banyak Komentar</th>
                            <th style="border: 2px solid black; text-align: center;">Negatif</th>
                            <th style="border: 2px solid black; text-align: center;">Positif</th>
                            <th style="border: 2px solid black; text-align: center;">Netral</th>
                            <th style="border: 2px solid black; text-align: center;">Rata-rata</th>
                            <th style="border: 2px solid black; text-align: center;">Grafik</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        while ($row=$query->fetch_assoc()){
                            // hitung banyak komen
                            $id_posting = $row['id_posting'];
                            $count_comment = $conn->query("SELECT count(id_posting) as banyak FROM table_komentar")->fetch_row();
                            $komentar = $conn->query("SELECT komentar FROM table_komentar where id_posting=$id_posting;");
                            $class = $sentiment->categorise($string);
                            $chartId = 'piechart_' . $i;
                            $positif = 0;
                            $negatif = 0;
                            $netral = 0;
                            // $jumlah_kat = 3;
                            while($komen = $komentar->fetch_assoc()){
                                $kategori = $sentiment->categorise($komen['komentar']);
                                if($kategori=='positif'){
                                    $positif++;
                                } elseif($kategori=='negatif'){
                                    $negatif++;
                                } elseif($kategori=='netral'){
                                    $netral++;
                                }
                            }
                            if($positif>$negatif && $positif>$netral){
                                $rata_rata_kategori = "Positif";
                            } elseif($negatif>$positif && $negatif>$netral){
                                $rata_rata_kategori = "Negatif";
                            } else{
                                $rata_rata_kategori = "Netral";
                            }
                            ?>
                            <tr>
                                <td style="border: 2px solid black; text-align: center;"><?php echo $i++;?></td>
                                <td style="border: 2px solid black; text-align: center;"><?php echo $row['judul_posting'];?></td>
                                <td style="border: 2px solid black; text-align: center;"><?php echo $count_comment[0];?></td>
                                <td style="border: 2px solid black; text-align: center;"><?php echo $negatif;?></td>
                                <td style="border: 2px solid black; text-align: center;"><?php echo $positif;?></td>
                                <td style="border: 2px solid black; text-align: center;"><?php echo $netral;?></td>
                                <td style="border: 2px solid black; text-align: center;"><?php echo $rata_rata_kategori;?></td>
                                <td style="border: 2px solid black; text-align: center;">
    <div id="piechart-<?php echo $row['id_posting']; ?>" style="width: 300px; height: 200px;"></div>
    <script type="text/javascript">
        google.charts.setOnLoadCallback(function () {
            drawChart(<?php echo $negatif; ?>, <?php echo $positif; ?>, <?php echo $netral; ?>, '<?php echo $row['id_posting']; ?>');
        });

        function drawChart(negatif, positif, netral, id_posting) {
            var data = google.visualization.arrayToDataTable([
                ['Sentiment', 'Jumlah'],
                ['Negatif', negatif],
                ['Positif', positif],
                ['Netral', netral]
            ]);

            var options = {
                title: 'Sentiment Analysis',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart-' + id_posting));
            chart.draw(data, options);
        }
    </script>
</td>
                            </tr>
                            <?php
                          
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
