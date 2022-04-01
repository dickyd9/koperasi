<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- support-section start -->
                <div class="row">
                    <div class="col">
                        <div class="card support-bar overflow-hidden">
                            <div class="card-body pb-0 text-center">
                                <h1 class="m-0 mb-2">Selamat Datang Di Koperasi</h1>
                                <h3 class="m-0">KARANG TARUNA SUKABAKTI</h3>
                                <p class="mb-3 mt-5">Jumlah Data Pada Koperasi Sukabakti.</p>
                            </div>
                            <div id="support-chart"></div>
                            <div class="card-footer bg-primary text-white">
                                <div class="row text-center">
                                    <div class="col">
                                    <?php 
                                    $data_anggota = mysqli_query($koneksi,"SELECT * FROM anggota"); 
                                    $jumlah_anggota = mysqli_num_rows($data_anggota);
                                    ?>
                                        <h4 class="m-0 text-white"><?php echo $jumlah_anggota; ?></h4>
                                        <span>Anggota</span>
                                    </div>
                                    <div class="col">
                                    <?php 
                                    $data_simpanan = mysqli_query($koneksi,"SELECT * FROM simpanan"); 
                                    $jumlah_simpanan = mysqli_num_rows($data_simpanan);
                                    ?>
                                        <h4 class="m-0 text-white"><?php echo $jumlah_simpanan; ?></h4>
                                        <span>Simpanan</span>
                                    </div>
                                    <div class="col">
                                    <?php 
                                    $data_pinjaman = mysqli_query($koneksi,"SELECT * FROM pinjaman"); 
                                    $jumlah_pinjaman = mysqli_num_rows($data_pinjaman);
                                    ?>
                                        <h4 class="m-0 text-white"><?php echo $jumlah_pinjaman; ?></h4>
                                        <span>Pinjaman</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- support-section end -->
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- Button trigger modal -->
<!-- [ Main Content ] end -->