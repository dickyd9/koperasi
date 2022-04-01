<?php
include "../../config/koneksi.php";
require("../../assets/plugins/pdf/fpdf.php");
//Menampilkan data dari tabel di database

$query = "SELECT * FROM pinjaman ORDER BY no_pinjaman ASC ";
$result = $koneksi->query($query);

//Inisiasi untuk membuat header kolom
$column_no_pinjaman = "";
$column_tanggal = "";
$column_nama = "";
$column_jumlah_pinjaman = "";
$column_tenor = "";
$column_angsuran= "";
$column_status= "";
$tgl= "Tanggal : ".date("l, d F Y");

//For each row, add the field to the corresponding column
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc())
    {
        $no_pinjaman = $row["no_pinjaman"];
        $tanggal = $row["tanggal_pinjaman"];
        $nama = $row["nama_anggota"];
        $jumlah_pinjaman = 'Rp.'. number_format($row["jumlah_pinjaman"]);
        $tenor = $row['tenor'];
        $jumlah_angsuran = 'Rp.'. number_format($row["jumlah_angsuran"]);
        $status = $row['status'];
        

        $column_no_pinjaman = $column_no_pinjaman.$no_pinjaman."\n";
        $column_tanggal = $column_tanggal.$tanggal."\n";
        $column_nama = $column_nama.$nama."\n";
        $column_jumlah_pinjaman = $column_jumlah_pinjaman.$jumlah_pinjaman."\n";
        $column_tenor = $column_tenor.$tenor."\n";
        $column_angsuran = $column_angsuran.$jumlah_angsuran."\n";
        $column_status = $column_status.$status."\n";
        

    //Create a new PDF file
    $pdf = new FPDF('L','mm','A4'); //L For Landscape / P For Portrait
    $pdf->AddPage();

    //Menambahkan Gambar
    //$pdf->Image('../foto/logo.png',10,10,-175);
    $pdf->SetFont('arial','i','9');
    $pdf->Cell(0, 10, $tgl, '0', 1, 'P');
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(125);
    $pdf->Cell(30,10,'DATA PINJAMAN',0,0,'C');
    $pdf->Ln();
    $pdf->Cell(125);
    $pdf->Cell(30,10,'KOPERASI KARANG TARUNA | SUKABAKTI',0,0,'C');
    $pdf->Ln();
    

    }
}


//Fields Name position
$Y_Fields_Name_position = 40;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(45);
$pdf->Cell(25,8,'No Pinjaman',1,0,'C',1);
$pdf->SetX(70);
$pdf->Cell(40,8,'Tanggal Pinjaman',1,0,'C',1);
$pdf->SetX(110);
$pdf->Cell(35,8,'Nama Anggota',1,0,'C',1);
$pdf->SetX(145);
$pdf->Cell(45,8,'Jumlah Pinjaman',1,0,'C',1);
$pdf->SetX(190);
$pdf->Cell(25,8,'Tenor',1,0,'C',1);
$pdf->SetX(215);
$pdf->Cell(25,8,'Angsuran',1,0,'C',1);
$pdf->SetX(240);
$pdf->Cell(25,8,'Status',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 48;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(25,6,$column_no_pinjaman,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(40,6,$column_tanggal,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(110);
$pdf->MultiCell(35,6,$column_nama,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(45,6,$column_jumlah_pinjaman,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(190);
$pdf->MultiCell(25,6,$column_tenor,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(215);
$pdf->MultiCell(25,6,$column_angsuran,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(240);
$pdf->MultiCell(25,6,$column_status,1,'C');

$pdf->Output();
?>