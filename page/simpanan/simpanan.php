<?php
    $no=1;
    $simpanan = mysqli_query($koneksi,"SELECT * FROM simpanan");
    $smp = mysqli_fetch_array($simpanan);

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
                            <h5 class="m-b-10">Tabel Simpanan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Simpanan</a></li>
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
                        <button class="btn btn-success btn-sm btn-round has-ripple" data-toggle="modal" data-target="#modal-tambah">
                            <i class="feather icon-plus"></i> Tambah Data<span class="ripple ripple-animate"></span>
                        </button>
                        <a href="page/simpanan/laporan_simpanan.php" class="btn btn-danger btn-sm btn-round has-ripple">
                            <i class="feather icon-printer"></i> Laporan<span class="ripple ripple-animate"></span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>No Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Anggota</th>
                                        <th>Jumlah Simpanan</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no=1;
                                    $simpanan = mysqli_query($koneksi,"SELECT * FROM simpanan");
                                    while($s = mysqli_fetch_array($simpanan))
                                    {
                                ?>
                                    <tr>
                                        <td><?php echo $s['no_transaksi']; ?></td>
                                        <td><?php echo $s['tanggal_simpanan']; ?></td>
                                        <td><?php echo $s['nama_anggota']; ?></td>
                                        <td><?php echo "Rp. ".number_format($s['jumlah_simpanan'])." ,-"; ?></td>
                                        <td>
                                            <a href="page/simpanan/inv_simpanan.php?no_transaksi=<?=$s['no_transaksi']?>" class="btn btn-icon btn-success has-ripple">
                                                <i class="feather icon-printer"></i>
                                            </a>

                                            <a href="#" class="btn btn-icon btn-primary has-ripple" data-toggle="modal" data-target="#update<?php echo $s['no_transaksi']; ?>">
                                                <i class="feather icon-edit"></i>
                                            </a>

                                            <a href="#" class="btn btn-icon btn-danger has-ripple" data-toggle="modal" data-target="#delete<?php echo $s['no_transaksi']; ?>">
                                                <i class="feather icon-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- modal report -->
                                    <div class="example-modal">
                                        <div id="laporan" class="modal fade" role="dialog" style="display:none;">
                                            <form method="POST" action="" class="form-inline mt-3">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card-body">
                                                                <input type="date" name="datetimes" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="page/simpanan/function_simpanan.php?act=delete&id=<?php echo $s['no_transaksi']; ?>" class="btn btn-primary" type="submit" name="submit" value="Simpan">Submit</a>
                                                            <button class="btn btn-danger">Clear</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- modal report -->

                                    <!-- modal delete -->
                                    <div class="example-modal">
                                        <div id="delete<?php echo $s['no_transaksi']; ?>" class="modal fade" role="dialog" style="display:none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4 align="center" >Apakah anda yakin ingin menghapus  <?php echo $s['no_transaksi'];?><strong><span class="grt"></span></strong> ?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="page/simpanan/function_simpanan.php?act=delete&id=<?php echo $s['no_transaksi']; ?>" class="btn btn-primary" type="submit" name="submit" value="Simpan">Submit</a>
                                                        <button class="btn btn-danger">Clear</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal delete -->

                                    <!-- modal update -->
                                    <div class="modal fade" id="update<?php echo $s['no_transaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-m">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Simpanan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="page/simpanan/function_simpanan.php?act=tambah_simpanan" method="post" role="form">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="label" for="No">No Transaksi</label>
                                                                    <input type="text" class="form-control" name="no_transaksi" required="required" value="<?php echo $s['no_transaksi']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="label" for="Tanggal">Tanggal</label>
                                                                    <input type="text" class="form-control" name="tanggal_simpanan" value="<?php echo $s['tanggal_simpanan']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="label" for="Tanggal">Tanggal</label>
                                                                    <input type="text" class="form-control" name="tanggal_simpanan" value="<?php echo $s['nama_anggota']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="label" for="Name">Jumlah Simpanan</label>
                                                                    <input type="text" class="form-control" name="jumlah_simpanan" placeholder="<?php echo "Rp. ".number_format($s['jumlah_simpanan'])." ,-"; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="form-group">
                                                                    <button class="btn btn-primary" type="submit" name="submit" value="Simpan">Submit</button>
                                                                    <button class="btn btn-danger">Clear</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal update -->
                                <?php
                                $no++; 
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

<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Simpanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php
                $query = mysqli_query($koneksi, "SELECT max(no_transaksi) as transaksi FROM simpanan");
                $data = mysqli_fetch_array($query);
                $no = $data['transaksi'];

                $urutan = (int) substr($no, 3, 3);
                $urutan++;

                $huruf = "SP";
                $no = $huruf . sprintf("%03s", $urutan);
            ?>
                <form action="page/simpanan/function_simpanan.php?act=tambah_simpanan" method="post" role="form">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="No">No Transaksi</label>
                                <input type="text" class="form-control" name="no_transaksi" id="no_transaksi" required="required" value="<?php echo $no ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="Tanggal">Tanggal</label>
                                <input type="text" class="form-control" name="tanggal_simpanan" id="tanggal_simpanan" value="<?php echo date("d-m-Y"); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="Anggota">Anggota</label>
                                <select name="nama_anggota" id="nama_anggota" class="form-control selectpicker" title="-- Pilih Anggota --">
                                <?php 
                                    $ambil = $koneksi->query("SELECT * FROM anggota");
                                    while($result = $ambil->fetch_array()){
                                ?>
                                    <option value="<?php echo $result['nama_anggota'] ?>"><?php echo $result['id_anggota']?> | <?php echo $result['nama_anggota']?></option>
                                <?php
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="Simpanan">Jumlah Simpanan</label>
                                <input type="text" class="form-control" name="jumlah_simpanan" id="jumlah_simpanan" placeholder="Rp .">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <button class="btn btn-primary" type="submit" name="submit" id="submit">Submit</button>
                                <button class="btn btn-danger">Clear</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>