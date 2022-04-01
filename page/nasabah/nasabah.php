<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tabel Anggota</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Anggota</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row justify-content-center">
            <!-- liveline-section start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6 text-left">
                                <h5>List Anggota</h5>
                            </div>
                            <div class="col-sm-6 text-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-report"><i class="feather icon-plus"></i> New User</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php
                $no=1;
                $anggota = mysqli_query($koneksi,"SELECT * FROM anggota");
                while($a = mysqli_fetch_array($anggota))
                {
            ?>
                <div class="col-lg-3 col-md-5">

                    <div class="card user-card user-card-1 mt-4">

                        <div class="card-body pt-0">

                            <div class="user-about-block text-center">
                                <div class="row align-items-end">
                                    <div class="col text-left pb-3">
                                        <h5 class="mb-1 mt-3"><?php echo $a['id_anggota']; ?></h5>
                                    </div>
                                    <div class="col"><img class="img-radius img-fluid wid-80" src="assets/images/avatar.png" alt="User image"></div>
                                    <div class="col text-right pb-3">
                                        <div class="dropdown">
                                            <a class="drp-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete<?php echo $a['id_anggota']; ?>">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- modal delete -->
                            <div class="example-modal">
                                <div id="delete<?php echo $a['id_anggota']; ?>" class="modal fade" role="dialog" style="display:none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 align="center" >Apakah anda yakin ingin menghapus  <?php echo $a['nama_anggota']; ?><strong><span class="grt"></span></strong> ?</h4>
                                        </div>
                                        <div class="modal-footer col-sm-12">
                                            <a href="page/nasabah/function_nasabah.php?act=delete&id=<?php echo $a['id_anggota']; ?>" class="btn btn-primary" type="submit" name="submit" value="Simpan">Submit</a>
                                            <button class="btn btn-danger">Clear</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal delete -->

                            <div class="text-center">
                                <a href="index.php?page=detail&nama_anggota=<?php echo $a['nama_anggota'];?>">
                                    <h4 class="mb-1 mt-3"><?php echo $a['nama_anggota']; ?></h4>
                                </a>
                                <p class="mb-3 text-muted"><i class="feather icon-calendar"> </i>Bergabung Sejak : <br><?php echo $a['tanggal_daftar']; ?></p>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col text-left">
                                            <p class="mb-1">Tanggal Lahir</p>
                                            <p class="mb-1">No Telpon</p>
                                            <p class="mb-1">Pekerjaan</p>
                                            <p class="mb-1">Alamat</p>
                                        </div>
                                        <div class="text-muted text-left col">
                                            <p class="mb-1">:    <?php echo $a['tanggal_lahir']; ?></p>
                                            <p class="mb-1">:    <?php echo $a['no_telpon']; ?></p>
                                            <p class="mb-1">:    <?php echo $a['pekerjaan_anggota']; ?></p>
                                            <p class="mb-1">:    <?php echo $a['alamat_anggota']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                
            <?php
            $no++; 
            }
            ?>
            <!-- liveline-section end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>


<div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-m">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php
                $query = mysqli_query($koneksi, "SELECT max(id_anggota) as no FROM anggota");
                $data = mysqli_fetch_array($query);
                $no = $data['no'];

                $urutan = (int) substr($no, 3, 3);
                $urutan++;

                $huruf = "KP";
                $no = $huruf . sprintf("%03s", $urutan);
            ?>
                <form action="page/nasabah/function_nasabah.php?act=tambah_anggota" method="post" role="form">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="Id">Id</label>
                                <input type="text" class="form-control " name="id_anggota" value="<?php echo $no ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="Tanggal">Tanggal</label>
                                <input type="text" class="form-control" name="tanggal" value="<?php echo date("d-m-Y"); ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="nama"><small class="text-danger">* </small>Nama Lengkap</label>
                                <input type="text" class="form-control " name="nama_anggota" id="nama" placeholder="Masukan Nama Lengkap ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="pekerjaan"><small class="text-danger">* </small>Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan_anggota" id="pekerjaan" placeholder="Masukan Pekerjaan ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="label" for="telpon"><small class="text-danger">* </small>No Telpon</label>
                                <input type="text" class="form-control" name="no_telpon" id="telpon" placeholder="Masukan No Telpon ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="label" for="tanggal_lahir"><small class="text-danger">* </small>Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tgl_lahir" placeholder="123">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label class="label" for="Alamat"><small class="text-danger">* </small>Alamat</label>
                                <textarea class="form-control" name="alamat_anggota" id="alamat" rows="3" spellcheck="false"  placeholder="Masukkan Alamat ...."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-primary" type="submit" name="submit" value="Simpan">Submit</button>
                            <button class="btn btn-danger">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- [ Main Content ] end -->