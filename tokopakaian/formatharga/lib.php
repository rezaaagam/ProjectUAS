<?php
function rupiah($harga_pakaian){
	$hasil_rupiah = "Rp." . number_format($harga_pakaian,2,',',',');
	return $hasil_rupiah;
}
?>