<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $nama_database = "falih";

    $db = mysqli_connect($servername, $username, $password, $nama_database);

    if(!$db){
        die("Koneksi Gagal: ".mysqli_connect_error());
    }

    

    

?>