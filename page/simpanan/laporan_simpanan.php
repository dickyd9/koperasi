<?php
include "../../config/koneksi.php";
require("../../assets/plugins/pdf/fpdf.php");
//Menampilkan data dari tabel di database

$query = "SELECT * FROM simpanan ORDER BY no_transaksi ASC";
$result = $koneksi->query($query);

//Inisiasi untuk membuat header kolom
$column_no_transaksi = "";
$column_tanggal = "";
$column_nama = "";
$column_jumlah_simpanan = "";
$tgl= "Tanggal : ".date("l, d F Y");

//For each row, add the field to the corresponding column
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc())
    {
        $no_transaksi = $row["no_transaksi"];
        $tanggal = $row["tanggal_simpanan"];
        $nama = $row["nama_anggota"];
        $jumlah_simpanan = 'Rp.'. number_format($row["jumlah_simpanan"]);
        

        $column_no_transaksi = $column_no_transaksi.$no_transaksi."\n";
        $column_tanggal = $column_tanggal.$tanggal."\n";
        $column_nama = $column_nama.$nama."\n";
        $column_jumlah_simpanan = $column_jumlah_simpanan.$jumlah_simpanan."\n";
        

    //Create a new PDF file
    $pdf = new FPDF('L','mm','A4'); //L For Landscape / P For Portrait
    $pdf->AddPage();

    //Menambahkan Gambar
    //$pdf->Image('../foto/logo.png',10,10,-175);
    $pdf->SetFont('arial','i','9');
    $pdf->Cell(0, 10, $tgl, '0', 1, 'P');
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(125);
    $pdf->Cell(30,10,'DATA SIMPANAN',0,0,'C');
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
$pdf->SetX(60);
$pdf->Cell(25,8,'No Transaksi',1,0,'C',1);
$pdf->SetX(85);
$pdf->Cell(60,8,'Tanggal Simpanan',1,0,'C',1);
$pdf->SetX(145);
$pdf->Cell(35,8,'Nama Anggota',1,0,'C',1);
$pdf->SetX(180);
$pdf->Cell(60,8,'Jumlah Simpanan',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 48;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(60);
$pdf->MultiCell(25,6,$column_no_transaksi,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(85);
$pdf->MultiCell(60,6,$column_tanggal,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(35,6,$column_nama,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(180);
$pdf->MultiCell(60,6,$column_jumlah_simpanan,1,'C');

$pdf->Output();
?>