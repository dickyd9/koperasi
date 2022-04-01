<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                        <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tabel Pinjaman</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Pinjaman</a></li>
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
                            <a href="page/pinjaman/laporan_pinjaman.php" class="btn btn-danger btn-sm btn-round has-ripple">
                                <i class="feather icon-printer"></i> Laporan<span class="ripple ripple-animate"></span>
                            </a>
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
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no=1;
                                    $pinjaman = mysqli_query($koneksi,"SELECT * FROM pinjaman");
                                    while($p = mysqli_fetch_array($pinjaman))
                                    {
                                ?>
                                    <tr>
                                        <td><?php echo $p['no_pinjaman']; ?></td>
                                        <td><?php echo $p['tanggal_pinjaman']; ?></td>
                                        <td><?php echo $p['nama_anggota']; ?></td>
                                        <td><?php echo "Rp. ".number_format($p['jumlah_pinjaman'])." ,-"; ?></td>
                                        <td><?php echo $p['tenor']; ?></td>
                                        <td><?php echo $p['bunga']; ?></td>
                                        <td><?php echo "Rp. ".number_format($p['jumlah_angsuran'])." ,-"; ?></td>
                                        <td>
                                            <a href="page/pinjaman/inv_pinjaman.php?no_pinjaman=<?=$p['no_pinjaman']?>" class="btn btn-icon btn-success has-ripple">
                                                <i class="feather icon-printer"></i>
                                            </a>

                                            <a href="#" class="btn btn-icon btn-danger has-ripple" data-toggle="modal" data-target="#delete<?php echo $p['no_pinjaman']; ?>">
                                                <i class="feather icon-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- modal delete -->
                                    <div class="example-modal">
                                        <div id="delete<?php echo $p['no_pinjaman']; ?>" class="modal fade" role="dialog" style="display:none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4 align="center" >Apakah anda yakin ingin menghapus  <?php echo $p['no_pinjaman'];?><strong><span class="grt"></span></strong> ?</h4>
                                                </div>
                                                <div class="modal-footer col-sm-12">
                                                    <a href="page/pinjaman/function_pinjaman.php?act=delete&id=<?php echo $p['no_pinjaman']; ?>" class="btn btn-primary" type="submit" name="submit" value="Simpan">Submit</a>
                                                    <button class="btn btn-danger">Clear</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- modal delete -->
                                
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
                <h5 class="modal-title">Tambah Pinjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php
                $query = mysqli_query($koneksi, "SELECT max(no_pinjaman) as no FROM pinjaman");
                $data = mysqli_fetch_array($query);
                $no = $data['no'];

                $urutan = (int) substr($no, 3, 3);
                $urutan++;

                $huruf = "PJ";
                $no = $huruf . sprintf("%03s", $urutan);
            ?>
                <form action="page/pinjaman/function_pinjaman.php?act=tambah_pinjaman" name="pinjaman" method="post" role="form">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="No">No Pinjaman</label>
                                <input type="text" class="form-control" name="no_pinjaman" id="no_pinjaman" required="required" value="<?php echo $no ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="Tanggal">Tanggal</label>
                                <input type="text" class="form-control" name="tanggal_pinjaman" value=" <?php echo date("d-m-Y"); ?>" readonly>
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
                                <label class="label" for="jml">Jumlah Pinjaman</label>
                                <input type="text" class="form-control " name="jml" id="jml" placeholder="Rp ." onkeyup="sum();">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="tenor">Tenor</label>
                                <input type="text" class="form-control" name="tenor" id="tenor" placeholder="bulan" onkeyup="sum();">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="Bunga">Bunga</label>
                                <input type="text" class="form-control" name="bunga" id="bunga" value="10%" readonly>
                                <small class="form-text text-muted">* Bunga dibayarkan perbulan.</small>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="angsuran">Angsuran</label>
                                <output type="text" class="form-control" name="angsuran" id="angsuran" readonly> 
                            </div>
                        </div> 
                        <div class="col-sm-12">
                            <input class="btn btn-primary" type="submit" name="submit" value="Simpan">
                            <button class="btn btn-danger">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>