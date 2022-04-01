<?php

function tgl_ind_to_eng($tgl) {
	$tgl_eng=substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2); 
	return $tgl_eng;
}

$koneksi = mysqli_connect("localhost", "root", "", "db_koperasi");

if($_GET['act']== 'bayar_angsuran'){
    
    $tenor = $_POST['tenor'];
    $no_transaksi = $_POST['no_transaksi'];
    $ags_ke = $_POST['ags_ke'];
    $no_pinjaman = $_POST['no_pinjaman'];
    $tempo = tgl_ind_to_eng($_POST['jatuh_tempo']);
    $tgl_bayar = date("Y-m-d");
    $terlambat = $_POST['terlambat'];
    $denda = $_POST['denda'];
    $total = $_POST['total_bayar'];

    $denda = str_replace('Rp. ','',$denda);
    $denda = substr($denda, 0, strlen($denda));
    $denda = str_replace(',','',$denda);

    $total = str_replace('Rp. ','',$total);
    $total = substr($total, 0, strlen($total));
    $total = str_replace(',','',$total);

    //query
    if($tenor-$ags_ke>0){
        $querytambah =  mysqli_query($koneksi, "INSERT INTO angsuran VALUES('$no_transaksi' , '$no_pinjaman' , '$ags_ke' , '$tempo', '$tgl_bayar', '$terlambat', '$denda', '$total')");
        header("location:../../index.php?page=angsuran");
    }else {
        $querytambah =  mysqli_query($koneksi, "INSERT INTO angsuran VALUES('$no_transaksi' , '$no_pinjaman' , '$ags_ke' , '$tempo', '$tgl_bayar', '$terlambat', '$denda', '$total')");
        $qry_update=mysqli_query($koneksi, "UPDATE pinjaman set status='lunas' WHERE no_pinjaman='$no_pinjaman'");
        header("location:../../index.php?page=angsuran");
    }

    // if ($querytambah) {
    //     # code redicet setelah insert ke index
    //     header("location:../../index.php?page=angsuran");
    // }
    // else{
    //     echo "ERROR, tidak berhasil". mysqli_error($koneksi);
    // }
}
?>