<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_koperasi");

if($_GET['act']== 'tambah_simpanan'){

    $no_transaksi = $_POST['no_transaksi'];
    $nama_anggota = $_POST['nama_anggota'];
    $jumlah_simpanan = $_POST['jumlah_simpanan'];
    $tanggal_simpanan = date("Y-m-d");
    
    $jumlah_simpanan = str_replace('Rp. ','',$jumlah_simpanan);
    $jumlah_simpanan = str_replace('.','',$jumlah_simpanan);
    $jumlah_simpanan = substr($jumlah_simpanan, 0, strlen($jumlah_simpanan));

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO simpanan VALUES('$no_transaksi' , '$nama_anggota' , '$jumlah_simpanan' , '$tanggal_simpanan')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../../index.php?page=simpanan");
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
    $no_transaksi = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM simpanan WHERE no_transaksi = '$no_transaksi'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../../index.php?page=simpanan");
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>