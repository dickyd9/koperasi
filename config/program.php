<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : "dashboard";
switch ($page) {
    case 'nasabah':
		    include "page/nasabah/nasabah.php";
		    break;
        case 'detail':
            include "page/nasabah/detail_nasabah.php";
            break;
        case 'laporan_pinjaman':
		    include "page/nasabah/report_pinj_nasabah.php";
		    break;

    case 'pinjaman':
		    include "page/pinjaman/pinjaman.php";
            break;
        

    case 'simpanan':
        include "page/simpanan/simpanan.php";
        break;

    case 'report':
        include "page/report.php";
        break;

    case 'angsuran':
        include "page/angsuran/angsuran.php";
        break;

    case 'detail_angsuran':
        include "page/angsuran/detail_angsuran.php";
        break;

    case 'dashboard':
        default:
        include 'page/dashboard.php';
}
?>