<?php
function buatRp($angka){ //fungsi untuk membuat format rupiah
	$rupiah= "Rp" . number_format($angka,0,',','.');
	return $rupiah;
}

//fungsi untuk membuat nama bulan
function namabulan($angkabulan){
	switch ($angkabulan) {
		case '1':
			$bulan = "Januari";
			break;
		case '2':
			$bulan = "Februari";
			break;
		case '3':
			$bulan = "Maret";
			break;
		case '4':
			$bulan = "April";
			break;
		case '5':
			$bulan = "Mei";
			break;
		case '6':
			$bulan = "Juni";
			break;
		case '7':
			$bulan = "Juli";
			break;
		case '8':
			$bulan = "Agustus";
			break;
		case '9':
			$bulan = "September";
			break;
		case '10':
			$bulan = "Oktober";
			break;
		case '11':
			$bulan = "November";
			break;
		case '12':
			$bulan = "Desember";
			break;
		default:
			$bulan = "Tidak Ada Bulan yang Dipilih..";
			break;
	}
	return $bulan;
}
//fungsi untuk membuat tanggal
// 2020-07-31 contoh tanggal
function tanggal($tgl){
	$tanggal = substr($tgl, 8, 2);//huruf ke 8 2 angka yang di ubah
	$bulan = namabulan(substr($tgl, 5, 2));//huruf ke 5 2 angka yang di ubah
	$tahun = substr($tgl, 0, 4);//huruf ke 0 4 angka yang di ubah

	return $tanggal.' '.$bulan.' '.$tahun;
}
?>