<?php
require("../../assets/plugins/pdf/fpdf.php");
require("../../assets/plugins/lib-function.php");


    if(isset($_GET['no_pinjaman'])){
        $no_pinjaman = $_GET['no_pinjaman'];
    }
    else {
       die ("Error. No ID Selected!");    
    }

    include "../../config/koneksi.php";
    $query = "SELECT * FROM pinjaman WHERE no_pinjaman ='$no_pinjaman'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            $no_pinjaman = $row["no_pinjaman"];
            $tanggal = $row["tanggal_pinjaman"];
            $nama = $row["nama_anggota"];
            $jumlah_pinjaman = $row["jumlah_pinjaman"];
            $tenor = $row["tenor"];
            $angsuran = $row["jumlah_angsuran"];

            /*Deklarasi variable untuk cetak*/
            $pt='KARANG TARUNA SUKABAKTI';
            $jl='Koperasi Simpan Pinjam';
            $tel='-';
            $cash= $jumlah_pinjaman;
            $pembayar='PINJAMAN';
            $no = $no_pinjaman;
            $tanggal = $tanggal;
            $anggota = $nama;
            $tenor = $tenor;
            $angsuran = $angsuran;
            $notevalid='Data tersimpan di koperasi sukabakti';
            
        }
    }

class Kwitansi extends FPDF
{
    var $tanggal,$kwnums,$admins,$notevalid,$headerCo,$headerAddr,$headerTel;
    function Header()
    {
        $this->SetFont('Arial','B',12);
		$this->Cell(40,7,$this->headerCo,0,1,'L');
		$this->SetFont('Arial','B',11);
		$this->Cell(0,7,$this->headerAddr,0,1,'L');
		$this->Cell(120,7,$this->headerTel,0,0,'L');
		$this->Cell(0,7,$this->kwnums,0,1,'L');
		$this->SetFillColor(95, 95, 95);
		$this->Rect(5, 27.5, 198, 3, 'FD');
    }
    /* Footer Kwitansi*/
    function Footer(){
        $this->SetY(-40);
        $this->SetFont('Courier','',12);
        $this->Cell(130);
        $this->Cell(0,6,'Tangerang, '.$this->tanggal,0,1,'C');
        $this->Ln(10);
        $this->Ln(3);
        $this->SetFont('Arial','I',10);
        $this->Cell(0,6,$this->notevalid,0,1,'R');
    }
    function setHeaderParam($pt,$jl,$tel){
		$this->headerCo=$pt;
		$this->headerAddr=$jl;
		$this->headerTel=$tel;
		}
	function setTanggal($tgl){$this->tanggal=$tgl;}
	function setAdmins($admins){$this->admins=$admins;}
	function setKwtNums($kwnums){$this->kwnums=$kwnums;}
	function setValidasi($word){$this->notevalid=$word;}
}


$pdf=new Kwitansi('L','mm','A5');
$fungsi=new Fungsi();
$tglCetak=$fungsi->Tanggal('tgl').' '.$fungsi->Tanggal('blnL').' '.$fungsi->Tanggal('THN');
/* Retrieve No. Kwitansi*/

$pdf->setTanggal($tglCetak);
$pdf->setValidasi($notevalid);
$pdf->setHeaderParam($pt,$jl,$tel);

/* Bagian di mana inti dari kwitansi berada*/
$pdf->setMargins(5,5,5);
$pdf->AddPage();
$pdf->SetLineWidth(0.6);
$pdf->Ln(10);
$pdf->Cell(20);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,8,'Transaksi  : ',0,0,'R');
$pdf->SetFont('Courier','',14);
$pdf->Cell(16,8,$pembayar,0,1,'L');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20);
$pdf->Cell(40,8,'Pinjaman Sejumlah  : ',0,0,'R');
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,'###'.$fungsi->Terbilang($cash).' RUPIAH ###',0,'L');
$pdf->SetFont('Arial','B',14);
$pdf->SetY(-90);
$pdf->Cell(20);
$pdf->Cell(40,8,'No Pinjaman  : ',0,0,'R');
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,$no,0,'L');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20);
$pdf->Cell(40,8,'Nama Anggota  : ',0,0,'R');
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,$anggota,0,'L');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20);
$pdf->Cell(40,8,'Tanggal Pinjaman  : ',0,0,'R');
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,$tanggal,0,'L');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20);
$pdf->Cell(40,8,'Tenor  : ',0,0,'R');
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,$tenor.' Bulan',0,'L');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(20);
$pdf->Cell(40,8,'Jumlah Angsuran  : ',0,0,'R');
$pdf->SetFont('Courier','',12);
$pdf->MultiCell(120,8,'Rp '.$fungsi->Ribuan($angsuran),0,'L');
$pdf->SetY(-40);
$pdf->SetFont('Courier','B','16');
$pdf->Cell(60,12,'Rp '.$fungsi->Ribuan($cash),1,0,'C');
$pdf->SetAuthor('http://www.ayayank.com',true);
$pdf->Output();
?>