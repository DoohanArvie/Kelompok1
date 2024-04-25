<?php
    include 'config.php';

    if(isset($_POST['daftar'])){

        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $area = $_POST['area'];
        $komisi = $_POST['komisi'];
        $no_telp = $_POST['no_telp'];

        //buat query
        $sql = "INSERT INTO agents (AGENT_CODE, AGENT_NAME, WORKING_AREA, COMMISSION, PHONE_NO) VALUE ('$kode', '$nama', '$area', '$komisi', '$no_telp')";
        $query = mysqli_query($db, $sql);


        //apakah query berhasi disimpan?
        if($query){
            header('Location: list-daftar-agent.php');
        }else{
            die("Gagal menyimpan...");
        }
    }else{
        die("Akses dilarang...");
    }

    
?>