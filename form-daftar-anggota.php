<!DOCTYPE html>
<html>

<head>
    <title>Formulir Pendaftaran Anggota Perpustakaan | SMK Gamelab Indonesia</title>
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
        <h1>Formulir Pendaftaran Anggota Baru</h1>
    </header>
    <div>
        <form action="proses-tambah-data.php" method="POST">

            <fieldset>

                <p>

                    <label for="nama">Nama: </label>
                    <input type="text" name="nama" placeholder="Nama lengkap" />
                </p>
                <p>
                    <label for="alamat">Alamat: </label>
                    <textarea name="alamat" placeholder="Alamat lengkap"></textarea>
                </p>
                <p>
                    <label for="jenis_kelamin">Jenis Kelamin: </label>
                    <label><input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki</label>
                    <label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
                </p>
                <p>
                    <label for="agama">Agama: </label>
                    <select name="agama">
                        <option>Islam</option>
                        <option>Kristen</option>
                        <option>Hindu</option>
                        <option>Budha</option>
                        <option>Atheis</option>
                    </select>
                </p>
                <p>
                    <label for="asal_sekolah">Sekolah Asal: </label>
                    <input type="text" name="asal_sekolah" placeholder="Nama asal sekolah" />
                </p>
                <p>
                    <input type="submit" value="Daftar" name="daftar" />
                </p>

            </fieldset>

        </form>
    </div>
</body>

</html>