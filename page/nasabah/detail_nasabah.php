<?php

$nama_anggota = $_GET['nama_anggota'];
?>

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
                            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="index.php?page=nasabah">Anggota</a></li>
                            <li class="breadcrumb-item"><a href="#!">Detail Anggota</a></li>
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
                    <div class="card-header text-center">
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-6 text-left">
                                <h5>Detail Anggota</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center m-l-0">
                            <div class="col-sm-12 text-left">
                            <?php
                                $anggota = mysqli_query($koneksi,"SELECT * FROM anggota WHERE nama_anggota='$nama_anggota'");
                                while($a = mysqli_fetch_array($anggota))
                                {
                            ?>
                            <div class="row">
                                <div class="col-md-2">
                                    <h5>Id</h5>
                                    <h5>Nama</h5>
                                    <h5>No Telpon</h5>
                                </div>
                                <div class="col-md-2">
                                    <h5>: <?php echo $a['id_anggota'];?></h5>
                                    <h5>: <?php echo $a['nama_anggota'];?></h5>
                                    <h5>: <?php echo $a['no_telpon'];?></h5>
                                </div>
                            </div>
                            <?php 
                                }
                            ?>
                                <hr>
                                <div class="bt-wizard" id="besicwizard">
                                    <ul class="nav nav-pills nav-fill mb-3">
                                        <li class="nav-item"><a href="#b-w-tab1" class="nav-link has-ripple active" data-toggle="tab">Simpanan<span class="ripple ripple-animate" style="height: 252.45px; width: 252.45px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -112.425px; left: -26.225px;"></span></a></li>
                                        <li class="nav-item"><a href="#b-w-tab2" class="nav-link has-ripple" data-toggle="tab">Pinjaman<span class="ripple ripple-animate" style="height: 263.167px; width: 263.167px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -109.784px; left: -55.0335px;"></span></a></li>
                                        <li class="nav-item"><a href="#b-w-tab3" class="nav-link has-ripple" data-toggle="tab">Angsuran<span class="ripple ripple-animate" style="height: 240.883px; width: 240.883px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(70, 128, 255) none repeat scroll 0% 0%; opacity: 0.4; top: -107.641px; left: -77.0582px;"></span></a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="b-w-tab1">
                                            <div class="card-header">
                                                <button class="btn btn-danger btn-sm btn-round has-ripple" data-toggle="modal" data-target="#modal-report">
                                                    <i class="feather icon-printer"></i> Laporan<span class="ripple ripple-animate"></span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <div class="dt-responsive table-responsive">
                                                    <table class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>No Simpanan</th>
                                                                <th>Tanggal</th>
                                                                <th>Jumlah Simpanan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $simpanan = mysqli_query($koneksi,"SELECT * FROM simpanan WHERE nama_anggota='$nama_anggota'");
                                                        while($a = mysqli_fetch_array($simpanan))
                                                        {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $a['no_transaksi'];?></td>
                                                                <td><?php echo $a['tanggal_simpanan'];?></td>
                                                                <td>Rp. <?php echo number_format($a['jumlah_simpanan']);?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                        </tbody>
                                                        <tfoot>
                                                        <?php
                                                        $simpan = mysqli_query($koneksi,"SELECT SUM(jumlah_simpanan) as simpan FROM simpanan WHERE nama_anggota='$nama_anggota'");
                                                        while($query = mysqli_fetch_array($simpan))
                                                        {
                                                        ?>
                                                            <td class="font-weight-bold">Jumlah</td>
                                                            <td></td>
                                                            <td class="font-weight-bold">Rp. <?php echo number_format($query['simpan']);?> </td>
                                                        </tfoot>
                                                        <?php } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="b-w-tab2">
                                            <div class="card-header">
                                                <a href="page/nasabah/report_pinj_nasabah.php&nama_anggota=<?php echo $nama_anggota?>" class="btn btn-danger btn-sm btn-round">
                                                    <i class="feather icon-printer"></i> Laporan<span class="ripple ripple-animate"></span>
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="dt-responsive table-responsive">
                                                    <table class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>No Pinjaman</th>
                                                                <th>Tanggal</th>
                                                                <th>Jumlah Pinjaman</th>
                                                                <th>Tenor</th>
                                                                <th>Angsuran/Bln</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $pinjaman = mysqli_query($koneksi,"SELECT * FROM pinjaman WHERE nama_anggota='$nama_anggota'");
                                                        while($p = mysqli_fetch_array($pinjaman))
                                                        {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $p['no_pinjaman'];?></td>
                                                                <td><?php echo $p['tanggal_pinjaman'];?></td>
                                                                <td><?php echo $p['jumlah_pinjaman'];?></td>
                                                                <td><?php echo $p['tenor'];?></td>
                                                                <td><?php echo $p['jumlah_angsuran'];?></td>
                                                                <td><?php echo $p['status'];?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="b-w-tab3">
                                            <div class="card-header">
                                                <button class="btn btn-danger btn-sm btn-round has-ripple" data-toggle="modal" data-target="#modal-report">
                                                    <i class="feather icon-printer"></i> Laporan<span class="ripple ripple-animate"></span>
                                                </button>
                                            </div>
                                            <div class="card-body">
                                                <div class="dt-responsive table-responsive">
                                                    <table class="table table-striped table-bordered nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>No Pinjaman</th>
                                                                <th>Tanggal</th>
                                                                <th>Anggota</th>
                                                                <th>Jumlah Pinjaman</th>
                                                                <th>Bunga</th>
                                                                <th>Tenor</th>
                                                                <th>Angsuran/Bln</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>PJ001</td>
                                                                <td>17/11/2021</td>
                                                                <td>Edi Santoso</td>
                                                                <td>Rp. 2.000.000</td>
                                                                <td>0.50% Perbulan</td>
                                                                <td>12 Bulan</td>
                                                                <td>Rp. 205.000</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- liveline-section end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="First"><small class="text-danger">* </small>First Name</label>
                            <input type="text" class="form-control" id="Name" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="Last"><small class="text-danger">* </small>Last Name</label>
                            <input type="text" class="form-control" id="Last" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="Email"><small class="text-danger">* </small>Email Address</label>
                            <input type="email" class="form-control" id="Email" placeholder="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="Password"><small class="text-danger">* </small>New Password</label>
                            <input type="password" class="form-control" id="Password" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="floating-label" for="Membership"><small class="text-danger">* </small>Change Membership</label>
                            <select class="form-control" id="Membership">
                                <option value=""></option>
                                <option value="2">Bronze</option>
                                <option value="3">Gold</option>
                                <option value="4">Platinum</option>
                                <option value="5">Silver</option>
                                <option value="1">Trial</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label" for="Extend">Extend Membership</label>
                            <input type="date" class="form-control" id="Extend" placeholder="123">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="d-block mb-2">Status</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline3">Pending</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline4" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline3">Banned</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="d-block mb-2 mt-3">User Type</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="customRadioInline2" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadioInline21">Staff</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="customRadioInline2" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline22">Editor</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline3" name="customRadioInline2" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline23">Member</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="d-block mb-2">Newsletter Subscriber</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="customRadioInline3" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadioInline31">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="customRadioInline3" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline32">No</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label class="d-block mb-2">Send Email Notification</label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1"><Yes></Yes></label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group mt-3">
                            <label class="floating-label" for="Note">User Note</label>
                            <textarea class="form-control" id="Note" rows="6" spellcheck="false"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary"> Save </button>
                <button class="btn btn-danger"> Clear </button>
            </div>
        </div>
    </div>
</div>

<!-- [ Main Content ] end -->