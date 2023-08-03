<?php
include "config.php";

header('Content-Type: application/json');
//untuk insert data ke table_posting

$payload = file_get_contents("php://input");
/*
{
    "aksi" : "tambah",
    "tabel" : "posting",
    "judul_posting":"ini judulnya"
}
*/

$data = json_decode($payload);

if($data->aksi =="tambah"){
    $tabelnya = "table_".$data->tabel;
    if($data->tabel == 'posting'){
        $posting    = $data->judul_posting;
        $tgl        = date("Y-m-d");
   
    //insert ke tabel posting
    $querynya = "INSERT INTO $tabelnya (judul_posting,tgl_posting) value ('$posting','$tgl')";
    // echo $querynya;
    $query = $conn->query($querynya);
    if($query){
        echo "Insert posting Sukses!";
    }else{
        echo "Gagal Insert Posting!";
    }
}else if($data->tabel == 'komentar'){
         $posting    = $data->id_posting;
         $komentar   = $data->komentar;
   
    //insert ke tabel posting
    $querynya = "INSERT INTO $tabelnya (id_posting,komentar) value ('$posting','$komentar')";
    // echo $querynya;
    $query = $conn->query($querynya);
    if($query){
        echo "Insert Komentar Sukses!";
    }else{
        echo "Gagal Insert Komentar!";
    }
}

}else if ($data->aksi == 'view'){
    $tabelnya   = "table_".$data->tabel;
    $querynya = "SELECT * FROM $tabelnya";
    $query = $conn->query($querynya);
    if($query){
        while($row = $query->fetch_assoc()) {
            $myArray[] = $row;
        }

        echo json_encode($myArray);
    }else{
        echo "Gagal view Posting";
    }
}