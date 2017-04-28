<?php 
include "koneksi.php";
if(isset($_GET['pagi']) and isset($_GET['siang']) and isset($_GET['malam']) and isset($_GET['ringan'])){
	$pagi=$_GET['pagi'];
	$siang=$_GET['siang'];
	$malam=$_GET['malam'];
	$ringan=$_GET['ringan'];
	$ringana=$_GET['ringan'];
	$ringanb=$_GET['ringan'];
    $mulai=$_GET['mulai'];
    $akhir=$_GET['akhir'];
}else{ 
	$pagi=$_POST['pagi'];
	$siang=$_POST['siang'];
	$malam=$_POST['malam'];
	$ringan=$_POST['ringan'];
	$ringana=$_POST['ringan'];
	$ringanb=$_POST['ringan'];
    
    $mulai=1;
    $akhir=1;
}
$pagib=$pagi;
$siangb=$siang;
$malamb=$malam;
$ringanc=$ringan;
//Pencarian menu untuk makan pagi

//Pencarian makanan pokok
$mkpagi="select*from makanan where kalori<=$pagi and kode='AA' order by(kalori) DESC LIMIT $mulai, $akhir";
$query_mkpagi=mysql_query($mkpagi);
while($hasil = mysql_fetch_array($query_mkpagi)){
	$mkpagi_p = $hasil['nama'];
	$mkpagi_p_k = $hasil['kalori'];
	break;
}
$pagi = $pagi-$mkpagi_p_k;

//Pencarian untuk makan pagi 2(lauk)
$mkpagi_s="select*from makanan where kalori<=$pagi and kode='FA' order by(kalori) DESC LIMIT $mulai, $akhir";
$query_mkpagi_s=mysql_query($mkpagi_s);
$ketemu = mysql_num_rows($query_mkpagi_s);
if($ketemu>0){
	while($hasil=mysql_fetch_array($query_mkpagi_s)){
		$mkpagi_sa = $hasil['nama'];
		$mkpagi_sa_k = $hasil['kalori'];
		break;
	}
$pagi = $pagi-$mkpagi_sa_k;
}
//Pencarian untuk sisa kalori
$mkpagi_l = "select*from makanan where kalori<=$pagi order by(kalori) DESC LIMIT $mulai, $akhir";
$query_mkpagi_l = mysql_query($mkpagi_l);
$ketemu = mysql_num_rows($query_mkpagi_l);
if($ketemu>0){
	while($hasil = mysql_fetch_array($query_mkpagi_l)){
		$mkpagi_la = $hasil['nama'];
		$mkpagi_la_k = $hasil['kalori'];
		break;
	}
}

//Pencarian untuk makan ringan 1
$mkringan="select*from makanan where kalori<=$ringan and kode='PB' order by(kalori) DESC LIMIT $mulai, $akhir";
$query_mkringan=mysql_query($mkringan);
while($hasil = mysql_fetch_array($query_mkringan)){
	$mkringan_p = $hasil['nama'];
	$mkringan_p_k = $hasil['kalori'];
	break;
}
$ringan = $ringan-$mkringan_p_k;

//Pencarian untuk makan siang
$mksiang="select*from makanan where kalori<=$siang and kode='AA' order by(kalori) DESC LIMIT $mulai, $akhir";
$query_mksiang=mysql_query($mksiang);
while($hasil = mysql_fetch_array($query_mksiang)){
	if($mkpagi_p != $hasil['nama']){
		$mksiang_p = $hasil['nama'];
		$mksiang_p_k = $hasil['kalori'];
		break;
	}
}
$siang = $siang-$mksiang_p_k;

//Pencarian sayuran utk makan siang
$mksiang_s="select*from makanan where kalori<=$siang and kode='FA' order by(kalori) DESC LIMIT $mulai, $akhir";
$query_mksiang_s=mysql_query($mksiang_s);
$ketemu = mysql_num_rows($query_mksiang_s);
if($ketemu>0){
	while($hasil=mysql_fetch_array($query_mksiang_s)){
		if($hasil['nama'] != $mkpagi_sa){
			$mksiang_sa = $hasil['nama'];
			$mksiang_sa_k = $hasil['kalori'];
			break;
		}
	}
	$siang = $siang-$mksiang_sa_k;
}
//Pencarian untuk sisa kalori
$mksiang_l = "select*from makanan where kalori<=$siang order by(kalori) DESC LIMIT $mulai, $akhir";
$query_mksiang_l = mysql_query($mksiang_l);
$ketemu = mysql_num_rows($query_mksiang_l);
if($ketemu>0){
	while($hasil = mysql_fetch_array($query_mksiang_l)){
		if($hasil['nama'] != $mkpagi_la){
			$mksiang_la = $hasil['nama'];
			$mksiang_la_k = $hasil['kalori'];
			break;
		}
	}
}

//Pencarian untuk makan ringan 2
$mkringan="select*from makanan where kalori<=$ringana and kode='PB' order by(kalori) DESC LIMIT $mulai, $akhir";
$query_mkringan=mysql_query($mkringan);
while($hasil = mysql_fetch_array($query_mkringan)){
	if($hasil['nama'] != $mkringan_p){
		$mkringan_p_II = $hasil['nama'];
		$mkringan_p_k_II = $hasil['kalori'];
		break;
	}
}
$ringana = $ringana-$mkringan_p_k_II;

//Pencarian untuk makan malam
$mkmalam="select*from makanan where kalori<=$malam and kode='AA' order by(kalori) DESC LIMIT $mulai, $akhir";
$query_mkmalam=mysql_query($mkmalam);
while($hasil = mysql_fetch_array($query_mkmalam)){
	if($mkpagi_p != $hasil['nama'] && $hasil['nama'] != $mksiang_p){
		$mkmalam_p = $hasil['nama'];
		$mkmalam_p_k = $hasil['kalori'];
		break;
	}
}
$malam = $malam-$mkmalam_p_k;

//Pencarian sayuran utk makan malam
$mkmalam_s="select*from makanan where kalori<=$malam and kode='FA' order by(kalori) DESC LIMIT $mulai, $akhir";
$query_mkmalam_s=mysql_query($mkmalam_s);
$ketemu = mysql_num_rows($query_mkmalam_s);
if($ketemu>0){
	while($hasil=mysql_fetch_array($query_mkmalam_s)){
		if($hasil['nama'] != $mkpagi_sa && $hasil['nama'] != $mksiang_sa){
			$mkmalam_sa = $hasil['nama'];
			$mkmalam_sa_k = $hasil['kalori'];
			break;
		}
	}
	$malam = $malam-$mkmalam_sa_k;
}
//Pencarian untuk sisa kalori
$mkmalam_l = "select*from makanan where kalori<=$malam order by(kalori) DESC LIMIT $mulai, $akhir";
$query_mkmalam_l = mysql_query($mkmalam_l);
$ketemu = mysql_num_rows($query_mkmalam_l);
if($ketemu>0){
	while($hasil = mysql_fetch_array($query_mkmalam_l)){
		if($hasil['nama'] != $mkpagi_la && $hasil['nama'] != $mksiang_la){
			$mkmalam_la = $hasil['nama'];
			$mkmalam_la_k = $hasil['kalori'];
			break;
		}
	}
}

//Pencarian untuk makan ringan 3
$mkringan="select*from makanan where nama!='$mkringan_p' and nama!='$mkringan_p_II' and kalori<=$ringanb and kode='PB' order by(kalori) DESC LIMIT $mulai, $akhir";
$query_mkringan=mysql_query($mkringan);
while($hasil = mysql_fetch_array($query_mkringan)){
	if($hasil['nama'] != $mkringan_p && $hasil['nama'] != $mkringan_p_II){
		$mkringan_p_III = $hasil['nama'];
		$mkringan_p_k_III = $hasil['kalori'];
		break;
	}
}
$ringanb = $ringanb-$mkringan_p_k_III;
$mulai=$mulai+1;
$akhir=$akhir+1;
?>
<html>
<head>
	<title>Saran Menu makanan</title>
</head>
<body>
<table>
	<tr>
		<td>Makan Pagi</td>
		<td><?php echo "$mkpagi_p + $mkpagi_sa + $mkpagi_la"; ?></td>
	</tr>
	<tr>
		<td>Makan Ringan I</td>
		<td><?php echo $mkringan_p; ?></td>
	</tr>
	<tr>
		<td>Makan Siang</td>
		<td><?php echo "$mksiang_p + $mksiang_sa + $mksiang_la"; ?></td>
	</tr>
	<tr>
		<td>Makan Ringan II</td>
		<td><?php echo $mkringan_p_II; ?></td>
	</tr>
	<tr>
		<td>Makan Malam</td>
		<td><?php echo "$mkmalam_p + $mkmalam_sa + $mkmalam_la"; ?></td>
	</tr>
	<tr>
		<td>Makan Ringan III</td>
		<td><?php echo $mkringan_p_III; ?></td>
	</tr>
    </table>
    <a href="menu.php?<?php echo"pagi=$pagib&siang=$siangb&malam=$malamb&ringan=$ringanc&mulai=$mulai&akhir=$akhir"?>">lanjut</a>
</body>
</body>
</html>