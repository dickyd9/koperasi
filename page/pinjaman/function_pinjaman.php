<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_koperasi");

if($_GET['act']== 'tambah_pinjaman'){
    $no_pinjaman = $_POST['no_pinjaman'];
    $tanggal_pinjaman = date("Y-m-d");
    $nama_anggota = $_POST['nama_anggota'];
    $jumlah_pinjaman = $_POST['jml'];
    $tenor = $_POST['tenor'];
    $bunga = $_POST['bunga'];
    $angsuran = $_POST['angsuran'];


    $jumlah_pinjaman = str_replace(',','',$jumlah_pinjaman);
    $jumlah_pinjaman = substr($jumlah_pinjaman, 0, strlen($jumlah_pinjaman));

    $persen = $jumlah_pinjaman + ($jumlah_pinjaman * 10/100);
    $hasil = $persen / $tenor;

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO pinjaman VALUES('$no_pinjaman' , '$tanggal_pinjaman' , '$nama_anggota' , '$jumlah_pinjaman', '$tenor', '$bunga', '$hasil', 'belum lunas')");


    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../../index.php?page=pinjaman");
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
        header("location:../../index.php?page=pinjaman");    
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
    }
}
elseif ($_GET['act'] == 'delete')
{
    $no_pinjaman = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM pinjaman WHERE no_pinjaman = '$no_pinjaman'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../../index.php?page=pinjaman");
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>