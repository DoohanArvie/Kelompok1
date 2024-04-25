<?php

include("config.php");

if (!isset($_GET['id_anggota'])) {
    // kalau tidak ada id di query string
    header('Location: list-daftar-anggota.php');
}

//ambil id dari query string
$id = $_GET['id_anggota'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM anggota_perpus WHERE id_anggota=$id";
$query = mysqli_query($db, $sql);
$anggota = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Formulir Edit Anggota Perpustakaan | SMK Gamelab Indonesia</title>
</head>
<style>
    input[type=text],
    select {
        width: 100%;
        padding: 7px 15px;
        margin: 8px 0;
        display: inline-block;
        box-shadow: 3px 3px 5px grey;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        box-sizing: border-box;
    }

    textarea {
        width: 100%;
        height: 150px;
        padding: 7px 15px;
        box-sizing: border-box;
        box-shadow: 3px 3px 5px grey;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        resize: none;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        box-shadow: 3px 3px 5px #4CAF50;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 20px;
    }

    input[type=submit]:hover {
        background-color: grey;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 10px;
    }
</style>

<body>
    <header>
        <h1>Formulir Edit Anggota Perpustakaan</h1>
    </header>

    <form action="proses-edit-anggota.php" method="POST">

        <fieldset>

            <input type="hidden" name="id_anggota" value="<?php echo $anggota['id_anggota'] ?>" />

            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $anggota['nama'] ?>" />
            </p>
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat"><?php echo $anggota['alamat'] ?></textarea>
            </p>
            <p>
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <?php $jk = $anggota['jenis_kelamin']; ?>
                <label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?>> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?>> Perempuan</label>
            </p>
            <p>
                <label for="agama">Agama: </label>
                <?php $agama = $anggota['agama']; ?>
                <select name="agama">
                    <option <?php echo ($agama == 'Islam') ? "selected" : "" ?>>Islam</option>
                    <option <?php echo ($agama == 'Kristen') ? "selected" : "" ?>>Kristen</option>
                    <option <?php echo ($agama == 'Hindu') ? "selected" : "" ?>>Hindu</option>
                    <option <?php echo ($agama == 'Budha') ? "selected" : "" ?>>Budha</option>
                    <option <?php echo ($agama == 'Atheis') ? "selected" : "" ?>>Atheis</option>
                </select>
            </p>
            <p>
                <label for="sekolah_asal">Asal Sekolah: </label>
                <input type="text" name="asal_sekolah" placeholder="Nama Asal Sekolah" value="<?php echo $anggota['asal_sekolah'] ?>" />
            </p>
            <p>
                <input type="submit" value="Simpan" name="simpan" />
            </p>

        </fieldset>


    </form>

</body>

</html>