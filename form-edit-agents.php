<?php
    include 'config.php';

    if(isset($_GET['kode'])){
        $kode = $_GET['kode'];

        $sql = "SELECT * FROM agents WHERE AGENT_CODE='$kode'";
        $query = mysqli_query($db, $sql);
        $anggota = mysqli_fetch_assoc($query);

        if(mysqli_num_rows($query) < 1){
            die("Data tidak ditemukan...");
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <?php include 'navbar.php'; ?>
    <header>
        <h3 class="text-center my-2">Edit Agent</h3>
    </header>
    <div class="container shadow pt-3">
        <form action="proses-edit-agents.php" method="POST">    
            <fieldset>
                
                    
                <input type="hidden" name="kode" value="<?php echo $anggota['AGENT_CODE'] ?>" />
                <p class="mb-3">
                    <label class="form-label" for="nama">Nama: </label>
                    <input class="form-control" type="text" name="nama" placeholder="Nama" value="<?php echo $anggota['AGENT_NAME']?>" />
                </p>
                <p class="mb-3">
                    <label class="form-label" for="area">Area Kerja: </label>
                    <input class="form-control" name="area" placeholder="Area" value="<?php echo $anggota['WORKING_AREA']?>"></input>
                </p>
                <p class="mb-3">
                    <label class="form-label" for="komisi">Komisi: </label>
                    <input class="form-control" type="text" pattern="^\d+(\.\d{1,2})?$" name="komisi" placeholder="Komisi" value="<?php echo $anggota['COMMISSION']?>" />
                </p>
                <p class="mb-3">
                    
                </p>
                <p class="mb-3">
                    <label class="form-label" for="no_telp">No Telepon: </label>
                    <input class="form-control" type="number" name="no_telp" placeholder="No Telepon" value = "<?php echo $anggota['PHONE_NO'] ?>"/>
                </p>
                
                <p class="d-grid">
                    <input class="btn btn-success" type="submit" value="Simpan" name="simpan" />
                </p>
            </fieldset>

    </div>          

    
</body>
</html>