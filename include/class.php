<?php
include_once "config/koneksi.php";

class Angsuran
{
	//method mencari angsuran keberapa
	function ags($no_pinjaman)
	{
		$koneksi = mysqli_connect("localhost","root","","db_koperasi");

		// Check connection
		if (!$koneksi){
			die ("Koneksi database gagal : " . mysqli_connect_error());
		}
	
		$query=mysqli_query($koneksi,"SELECT max(angsuran_ke) as ags FROM angsuran WHERE no_pinjaman ='$no_pinjaman'");
		if(mysqli_num_rows($query)>0)
			{
				$data=mysqli_fetch_array($query);
				$ags = $data['ags']+1;
				return $ags;
			}
			else
			{
				$ags = 1;
				return $ags;
			}
	}

	function no()
	{
		$koneksi = mysqli_connect("localhost","root","","db_koperasi");
	
		// Check connection
		if (!$koneksi){
			die ("Koneksi database gagal : " . mysqli_connect_error());
	}
		$query=mysqli_query($koneksi,"SELECT max(no_transaksi) as transaksi FROM angsuran");
		$data=mysqli_fetch_array($query);
		
		$no = $data['transaksi'];
		

		$urutan = (int) substr($no, 3, 3);
		$urutan++;

		$huruf = "AG";
		$no = $huruf . sprintf("%03s", $urutan);
		return $no;
	}

	//method cari sisa angsuran
	function denda($ags,$tempo_bln,$tempo_tgl,$tempo_thn,$angsuran)
	{
		if ($ags>1)
        {
            $tempo = mktime(0,0,0, $tempo_bln+$ags, $tempo_tgl, $tempo_thn);
            $tanggal_bayar = mktime(0,0,0, date("m"), date("d"), date("Y"));
        }else{
            $tempo = mktime(0,0,0, $tempo_bln+1, $tempo_tgl, $tempo_thn);
            $tanggal_bayar = mktime(0,0,0, date("m"), date("d"), date("Y"));
        }
            $tglp_tempo=date("d-m-Y", $tempo);
            $denda = round(($tanggal_bayar-$tempo)/(60*60*24));
            
            if ($denda>0)
            {	
                $haridenda = $denda ;
                $jml_denda = ceil(500 *$denda);
				} 
				else 
				{
                $haridenda = 0;
                $jml_denda = 0;
            }
            $hasil = array($tglp_tempo,$haridenda,$jml_denda);
 			return $hasil;
	}

	//method hitung denda dan total pembayaran 
	function hitungTotal($angsuran,$jml_denda)
	{
		//hitung total pembayaran
		$tobay = $angsuran + $jml_denda ; 
 		return $tobay;
	}


}


?>