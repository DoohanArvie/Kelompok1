<?php

include("config.php");

// cek apakah tombol sudah diklik atau blum?
if (isset($_POST['simpan'])) {

    // ambil data dari formulir
    $id = $_POST['id_anggota'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['asal_sekolah'];

    // buat query update
    $sql = "UPDATE anggota SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', asal_sekolah='$sekolah' WHERE id_anggota=$id";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman list-daftar-anggota.php
        header('Location: list-daftar-anggota_AkbarHossamDelmiro.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}
