<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container{
            width: 50%;
            margin: 0 auto;
            padding: 20px;
        }
    </style>

</head>
<body>
    <?php include 'navbar.php'; ?>
    <header>
        <h3 class="text-center my-2">Daftar Anggota</h3>
    </header>
    <div class="container shadow">
	<form action="proses-tambah-agents.php" method="POST">
		
		<fieldset>
		
			<p class="mb-3">
				<label class="form-label" for="kode">Kode Agent: </label>
				<input class="form-control" type="text" name="kode" placeholder="Kode" />
			</p>
			<p class="mb-3">
				<label class="form-label" for="nama">Nama: </label>
				<input class="form-control" type="text" name="nama" placeholder="Nama" />
			</p>
			<p class="mb-3">
				<label class="form-label" for="area">Area Kerja: </label>
				<textarea class="form-control" name="area" placeholder="Area"></textarea>
			</p>
			<p class="mb-3">
				<label class="form-check-label" for="komisi">Komisi: </label>
				<input class="form-control" type="text" pattern="^\d+(\.\d{1,2})?$" name="komisi" placeholder="Komisi" />
			</p>
			<p class="mb-3">
				<label class="form-label" for="no_telp">No Telepon: </label>
				<input class="form-control" type="number" name="no_telp" placeholder="No Telepon" />
				
			</p>
			<p class="d-grid">
				<input class="btn btn-success" type="submit" value="Daftar" name="daftar" />
			</p>
		
		</fieldset>
	
	</form>
    </div>
    
</body>
</html>