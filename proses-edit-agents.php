<?php 
    include 'config.php';
    
    //cek apakah tombol sudah di klik
    if(isset($_POST['simpan'])){
        //ambil data dari formulir
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $area = $_POST['area'];
        $komisi = $_POST['komisi'];
        $no_telp = $_POST['no_telp'];
        
        
        //buat query update
        $sql = "UPDATE agents SET AGENT_NAME='$nama', WORKING_AREA='$area', COMMISSION='$komisi', PHONE_NO='$no_telp' WHERE AGENT_CODE='$kode'";
        $query = mysqli_query($db, $sql);
        
        //apakah query update berhasil?
        if($query){
            header('Location: list-daftar-agent.php');
        }else{
            die("Gagal menyimpan perubahan...");
        }
    }  
    else{
        die("Akses dilarang...");
    }

?>