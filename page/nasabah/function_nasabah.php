<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_koperasi");

if($_GET['act']== 'tambah_anggota'){
    $tanggal = date("Y-m-d");
    $id = $_POST['id_anggota'];
    $nama_anggota = $_POST['nama_anggota'];
    $pekerjaan = $_POST['pekerjaan_anggota'];
    $telpon = $_POST['no_telpon'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat_anggota'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO anggota VALUES('$id' , '$nama_anggota' , '$pekerjaan' , '$telpon', '$tanggal_lahir', '$tanggal', '$alamat')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../../index.php?page=nasabah");
    }
    else{
        echo "ERROR, tidak berhasil". mysqli_error($koneksi);
    }
}
elseif($_GET['act']=='updateuser')
{
    $jumlah_simpanan = $_POST['jumlah_simpanan'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE simpanan SET jumlah_simpanan='$jumlah_simpanan'");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../../index.php?page=simpanan");    
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
    }
}
elseif ($_GET['act'] == 'delete')
{
    $id_anggota = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota = '$id_anggota'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../../index.php?page=nasabah");
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>