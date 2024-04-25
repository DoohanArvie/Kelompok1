<?php
    include 'config.php';
    
    if(isset($_GET['kode'])){
        $kode = $_GET['kode'];
        
        $sql = "DELETE FROM agents WHERE AGENT_CODE='$kode'";
        $query = mysqli_query($db, $sql);

         
        
        if($query){
            header('Location: list-daftar-agent.php');
        }else{
            die("Gagal menghapus...");
        }
    }else{
        die("Akses dilarang...");
    }

?>