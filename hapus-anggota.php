<?php

include("config.php");

if (isset($_GET['id_anggota'])) {

    // ambil id dari query string
    $id = $_GET['id_anggota'];

    // buat query hapus
    $sql = "DELETE FROM anggota_perpus WHERE id_anggota=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if ($query) {
        header('Location: list-daftar-anggota_AkbarHossamDelmiro.php');
    } else {
        die("Gagal menghapus anggota...");
    }
} else {
    die("akses dilarang...");
}
