<?php  
    include '../page/page_config.php';

    $kategori    = $_POST['kategori'];

    if (isset($_POST['simpan'])) {
        $query = mysqli_query("INSERT INTO galeri_kategori (kategori) VALUES ('$kategori')") or die (mysqli_error('Tabel tidak ditemukan'));

        if ($query) {
            echo "<script>alert('Data Berhasil disimpan'); document.location.href='+home.php?page=Z2FsZXJpX2thdGVnb3JpX2lucHV0'; </script>";
        }else{
            echo "<script>alert('Data Gagal disimpan'); document.location.href='+home.php?page=Z2FsZXJpX2thdGVnb3JpX2lucHV0'; </script>";
        }
    }else{
        echo "<script>alert('Data Gagal disimpan'); document.location.href='+home.php?page=Z2FsZXJpX2thdGVnb3JpX2lucHV0'; </script>";
    }
?>