<?php 
$pinjaman = mysqli_query($koneksi,"SELECT * FROM pinjaman");
$p = mysqli_fetch_array($pinjaman);
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
                            <li class="breadcrumb-item"><a href="#!">Angsuran</a></li>
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
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <button class="btn btn-danger btn-sm btn-round has-ripple" data-toggle="modal" data-target="#modal-report">
                                    <i class="feather icon-printer"></i> Laporan<span class="ripple ripple-animate"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No Pinjaman</th>
                                        <th>Tanggal</th>
                                        <th>Anggota</th>
                                        <th>Jumlah Pinjaman</th>
                                        <th>Tenor</th>
                                        <th>Bunga</th>
                                        <th>Angsuran/bln</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM pinjaman";
                                    $query = mysqli_query($koneksi, $sql);
                                    while ($row = mysqli_fetch_array($query)){
                                        $status = $row['status'];
                                    ?>
                                    <tr>
                                        <td><?php echo $row['no_pinjaman'];?></td>
                                        <td><?php echo $row['tanggal_pinjaman']; ?></td>
                                        <td><?php echo $row['nama_anggota']; ?></td>
                                        <td><?php echo "Rp. ".number_format($row['jumlah_pinjaman'])." ,-"; ?></td>
                                        <td><?php echo $row['tenor']; ?></td>
                                        <td><?php echo $row['bunga']; ?></td>
                                        <td><?php echo "Rp. ".number_format($row['jumlah_angsuran'])." ,-"; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td>
                                            <a href="index.php?page=detail_angsuran&id=<?=$row['no_pinjaman']?>" class="btn btn-icon btn-success has-ripple">
                                                <i class="feather icon-edit"></i>
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