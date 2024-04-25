<?php include("config.php"); ?>


<!DOCTYPE html>
<html>

<head>
    <title>Pendaftaran Anggota Perpus Baru | SMK Gamelab Indonesia</title>
    <style>
        .anggota {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .anggota td,
        .anggota th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .anggota td {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
        }

        .anggota tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .anggota tr:hover {
            background-color: #ddd;
        }

        .anggota th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #04AA6D;
            color: white;
        }

        .fcc-btn1 {
            background-color: #008CBA;
            color: white;
            padding: 5px 15px;
            border-radius: 8px;
        }

        .fcc-btn2 {
            background-color: #f44336;
            color: white;
            padding: 5px 15px;
            border-radius: 8px;
        }

        .fcc-btn3 {
            background-color: #4CAF50;
            color: white;
            padding: 5px 15px;
            border-radius: 8px;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header>
        <h1>Daftar Anggota Perpustakaan yang sudah mendaftar</h1>
    </header>

    <nav>
        <a class='fcc-btn3' href="form-daftar-anggota.php">[+] Tambah Anggota</a>
    </nav>

    <br>

    <table border="1" class="anggota">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Alamat Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Asal Sekolah</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM anggota_perpus";
            $query = mysqli_query($db, $sql);

            while ($anggota = mysqli_fetch_array($query)) {
                echo "<tr>";

                echo "<td>" . $anggota['id_anggota'] . "</td>";
                echo "<td>" . $anggota['nama'] . "</td>";
                echo "<td>" . $anggota['alamat'] . "</td>";
                echo "<td>" . $anggota['jenis_kelamin'] . "</td>";
                echo "<td>" . $anggota['agama'] . "</td>";
                echo "<td>" . $anggota['asal_sekolah'] . "</td>";

                echo "<td>";
                echo "<a class='fcc-btn1' href='form-edit-anggota.php?id_anggota=" . $anggota['id_anggota'] . "' >Edit</a>    ";
                echo "<a class='fcc-btn2' href='hapus-anggota.php?id_anggota=" . $anggota['id_anggota'] . "' >Hapus</a>";
                echo "</td>";

                echo "</tr>";
            }
            ?>

        </tbody>
    </table>

    <h3>Total: <?php echo mysqli_num_rows($query) ?> Anggota baru</h3>

</body>

</html>