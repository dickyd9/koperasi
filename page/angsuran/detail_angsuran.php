<?php 
$angsur = new Angsuran();
$no_pinjaman = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM pinjaman WHERE no_pinjaman='$no_pinjaman'");
while ($data = mysqli_fetch_array($query))
{
$nama_anggota = $data['nama_anggota'];
$tenor = $data['tenor'];
$jumlah_pinjam = $data['jumlah_pinjaman'];
$angsuran = $data['jumlah_angsuran'];
$tanggal_pinjaman = $data['tanggal_pinjaman'];
$status = $data['status'];
}
?>

<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tabel Angsuran</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="index.php">Angsuran</a></li>
                            <li class="breadcrumb-item"><a href="#!">Detail Angsuran</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- Zero config table start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-center">
                        <div class="row">
                            <div class="col-sm-7 text-left">
                                <h5>Detail Anggota</h5>
                            </div>
                            <div class="col-sm-2 text-left">
                                <h5>Detail Pinjaman</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                        <div class="col-sm-12 text-left">
                            <?php
                                $anggota = mysqli_query($koneksi,"SELECT * FROM pinjaman 
                                JOIN anggota ON pinjaman.nama_anggota = anggota.nama_anggota
                                WHERE pinjaman.nama_anggota='$nama_anggota'");
                                while($a = mysqli_fetch_array($anggota))
                                {
                            ?>
                        <div class="row">
                            <div class="col-md-2">
                                <h5>Id</h5>
                                <h5>Nama</h5>
                                <h5>No Telpon</h5>
                            </div>
                            <div class="col-md-5">
                                <h5>: <?php echo $a['id_anggota'];?></h5>
                                <h5>: <?php echo $a['nama_anggota'];?></h5>
                                <h5>: <?php echo $a['no_telpon'];?></h5>
                            </div>
                            <div class="col-md-2">
                                <h5>No Pinjaman</h5>
                                <h5>Jumlah Pinjaman</h5>
                                <h5>Tenor</h5>
                                <h5>Angsuran/Bln</h5>
                                <h5>Status</h5>
                            </div>
                            <div class="col-md-2">
                                <h5>: <?php echo $a['no_pinjaman'];?></h5>
                                <h5>: Rp. <?php echo number_format($a['jumlah_pinjaman']);?></h5>
                                <h5>: <?php echo $a['tenor'];?> Bulan</h5>
                                <h5>: Rp. <?php echo number_format($a['jumlah_angsuran']);?></h5>
                                <h5>: <?php echo $a['status'];?></h5>
                            </div>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                </div>
            </div>
            <!-- Zero config table end -->
        </div>

        <div class="row">
            <!-- Zero config table start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6 text-left">
                                <h5>Detail Angsuran</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-danger btn-sm btn-round has-ripple" data-toggle="modal" data-target="#modal-report">
                                    <i class="feather icon-printer"></i> Laporan<span class="ripple ripple-animate"></span>
                                </button>
                            <?php
                            if ($status == 'belum lunas')
                            {
                            ?>
                                <button class="btn btn-success btn-sm btn-round has-ripple" data-toggle="modal" data-target="#bayar<?php echo $no_pinjaman; ?>">
                                    <i class="feather icon-bank"></i> Bayar Angsuran<span class="ripple ripple-animate"></span>
                                </button>
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Angsuran Ke</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Jumlah Angsuran</th>
                                        <th>Terlambat</th>
                                        <th>Denda</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM angsuran WHERE no_pinjaman='$no_pinjaman'");
                                while ($data = mysqli_fetch_array($query))
                                {
                                ?>
                                    <tr>
                                        <td><?php echo $data['angsuran_ke'];?></td>
                                        <td><?php echo $data['jatuh_tempo'];?></td>
                                        <td><?php echo $data['tanggal_bayar'];?></td>
                                        <td>Rp. <?php echo number_format($angsuran);?></td>
                                        <td><?php echo $data['terlambat'];?></td>
                                        <td>Rp. <?php echo number_format($data['denda']);?></td>
                                        <td>Rp. <?php echo number_format($data['total_bayar']);?></td>
                                        <td>
                                            <a href="page/angsuran/inv_angsuran.php?no_transaksi=<?=$data['no_transaksi']?>" class="btn btn-icon btn-danger has-ripple">
                                                <i class="feather icon-printer"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Zero config table end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->

<div class="modal fade" id="bayar<?php echo $no_pinjaman; ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bayar Angsuran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php
            $tempo_tgl = substr($tanggal_pinjaman,8,2);
            $tempo_bln= substr($tanggal_pinjaman,5,2);
            $tempo_thn =substr($tanggal_pinjaman,0,4);
            
            $no_transaksi = $angsur->no($no_pinjaman);

            $ags = $angsur->ags($no_pinjaman);

            $cekDendaTempo = $angsur->denda($ags,$tempo_bln,$tempo_tgl,$tempo_thn,$angsuran);
            //set value array 0 (value $tglp_tempo) pada method cekDenda() 
            $tgltempo=$cekDendaTempo[0];
            
            //set value array 1 (value $haridenda) pada method cekDenda()
            $haridenda=$cekDendaTempo[1];
            
            //set value array 2 (value $jml_denda) pada method cekDenda()
            $jumlahdenda=$cekDendaTempo[2];

            //hitung total bayar
	        $totalbayar=$angsur->hitungTotal($angsuran,$jumlahdenda);
            
            ?>
                <form action="page/angsuran/function_angsuran.php?act=bayar_angsuran" name="pinjaman" method="post" role="form">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="No">No Transaksi</label>
                                <input type="text" class="form-control" name="no_transaksi" required="required" value="<?php echo $no_transaksi; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="label" for="No">Angsuran Ke</label>
                                <input type="text" class="form-control" name="ags_ke" required="required" value="<?php echo $ags; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="label" for="No">No Pinjaman</label>
                                <input type="text" class="form-control" name="no_pinjaman" required="required" value="<?php echo $no_pinjaman ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="label" for="Tanggal">Jatuh Tempo</label>
                                <input type="text" class="form-control" name="jatuh_tempo" value="<?php echo $tgltempo; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="label" for="Tanggal">Tanggal Bayar</label>
                                <input type="text" class="form-control " name="tgl_bayar" value="<?php echo date("d-m-Y"); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="label" for="Tenor">Tenor</label>
                                <input type="text" class="form-control" name="tenor" value="<?php echo $tenor; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="label" for="Angsuran">Angsuran</label>
                                <input type="text" class="form-control" name="angsuran" value="Rp. <?php echo number_format($angsuran); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="Terlambat">Terlambat</label>
                                <input type="text" class="form-control" name="terlambat" value="<?php echo $haridenda; ?> Hari" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="Denda">Denda</label>
                                <input type="text" class="form-control" name="denda" value="Rp. <?php echo number_format($jumlahdenda); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="Total">Total Bayar</label>
                                <input type="text" class="form-control" name="total_bayar" value="Rp. <?php echo number_format($totalbayar); ?>" readonly> 
                            </div>
                        </div> 
                        <div class="col-sm-12">
                            <input class="btn btn-primary" type="submit" name="submit" value="Bayar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>