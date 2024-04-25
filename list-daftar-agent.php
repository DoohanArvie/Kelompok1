<?php include("config.php"); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran Agent | Gamelab Indonesia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    

</head>
<style>
    th{
        text-transform: uppercase;
    }
    td{
        text-transform: capitalize;
    }
</style>


<body>
    <?php include 'navbar.php'; ?>
	<header>
		<h3 class="text-center my-3">Daftar Agent yang sudah mendaftar</h3>
	</header>
	<div class="container-fluid">
        <nav>
            <a class='btn btn-primary' href="form-tambah-agents.php">[+] Tambah Agent</a>
        </nav>
        
        <br>
        
        <table border="1" class="anggota table table-success table-striped text-center">
        <thead>
            <tr>
                <th class="pe-3">Kode</th>
                <th class="pe-3">Nama</th>
                <th class="pe-3">Area Kerja</th>
                <th class="pe-3">Komisi</th>
                <th class="pe-3">No Telepon</th>
                <th class="pe-3">Tindakan</th>
                
            </tr>
        </thead>
        <tbody>
            
            <?php
            $sql = "SELECT * FROM agents";
            $query = mysqli_query($db, $sql);
            
            while($anggota = mysqli_fetch_array($query)){
                echo "<tr>";
                
                echo "<th>".$anggota['AGENT_CODE']."</th>";
                echo "<td>".$anggota['AGENT_NAME']."</td>";
                echo "<td>".$anggota['WORKING_AREA']."</td>";
                echo "<td>".$anggota['COMMISSION']."</td>";
                echo "<td>".$anggota['PHONE_NO']."</td>";
                
                echo "<td>";
                echo "<a class='btn btn-warning shadow m-1' href='form-edit-agents.php?kode=".$anggota['AGENT_CODE']."'>Edit</a>";
                echo "<a class='btn btn-danger shadow m-1' href='hapus-agents.php?kode=".$anggota['AGENT_CODE']."'>Hapus</a>";
                echo "</td>";
                
                echo "</tr>";
            }		
            ?>
            
        </tbody>
        </table>
        
        <h3>Total: <?php echo mysqli_num_rows($query) ?> Agent baru</h3>
	</div>
	</body>
</html>
