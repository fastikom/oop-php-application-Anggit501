<?php
$nama = $_POST['nama'];
$BB = $_POST['berat_badan'];
$TB = $_POST['tinggi_badan'];
$usia = $_POST['usia'];
$gender = $_POST['gender'];
$aktivitas = $_POST['aktivitas'];
?>
<html>
<head>
<title></title>
    <style>
         body {
            background: url("image/2.PNG") repeat-y;
    }
    </style>
</head>
<body>
<table border="1px">
<tr>
    <td>nama</td>
    <td>: <?php echo $nama; ?></td>
</tr>
<tr>
    <td>Berat</td>
    <td>: <?php echo $BB; ?></td>
</tr>
<tr>
    <td>Tinggi</td>
    <td>: <?php echo $TB; ?></td>
</tr>
    <tr>
    <td>Usia</td>
    <td>: <?php echo $usia; ?></td>
</tr>
<tr>
    <td>gender</td>
    <td>: <?php echo $gender; ?></td>
</tr>
<tr>
    <td>Aktivitas</td>
    <td>: <?php echo $aktivitas; ?></td>
</tr
</tr>
</table>
<?php
if($gender == "laki-laki"){
$bmi = ceil ($BB/(($TB/100)*($TB/100)));
echo "BMI kamu adalah $bmi";
echo "<p>Dari Berat Badan yang kamu masukkan, kamu termasuk : <br>";
$bbn = $TB-100;
if($bmi<17){
echo "<blockquote>&ldquo;Kurus&rdquo;</blockquote>";
echo "- Jangan lupa makan biar gak tambah kurus trus jadi Gizi Buruk, gimana tuh?</p>";
}else if($bmi<23){
echo "<blockquote>&ldquo;Normal&rdquo;</blockquote>";
echo "- Berat badan anda masih ideal(normal), santai bro</p>";
}else if($bmi<27){
echo "<blockquote>&ldquo;Gendut&rdquo;</blockquote>";
echo "- Rajin-rajinlah berolahraga karena kamu termasuk Gendut</p>";
}else{
echo "<blockquote>&ldquo;Obesitas&rdquo;</blockquote>";
echo "- Hati-hati anda sudah masuk kategori OBESITAS...!!!, jaga pola makan anda dan rajinlah berolahraga</p>";
}
if($TB>=160){
$bbi = $bbn-($bbn*0.1);
}else {
    $bbi =$bbn-1;
}
echo "berat badan ideal kamu adalah $bbi <br> ";
$kb = $bbi*30;
if($usia=2){
$kb = $kb-($kb*0.05);
}else if ($usia = 3){
 $kb = $kb-($kb*0.1) ;
}else if($usia = 4){
$kb = $kb-($kb*0.2);
}else{
$kb = $kb;
}
if($aktivitas == "ringan"){
$kk = $kb + ($kb*0.2);
}else if($aktivitas == "sedang"){
$kk = $kb + ($kb*0.3);
}else{
$kk = $kb + ($kb*0.5);
}
echo " kebutuhan kalori kamu adalah $kk";
}else{
$bmi = ceil ($BB/(($TB/100)*($TB/100)));
echo "BMI kamu adalah $bmi";
echo "<p>Dari Berat Badan yang kamu masukkan, kamu termasuk : <br>";
$bbn = $TB-100;
if($bmi<18){
echo "<blockquote>&ldquo;Kurus&rdquo;</blockquote>";
echo "- Jangan lupa makan biar gak tambah kurus trus jadi Gizi Buruk, gimana tuh?</p>";
}else if($bmi<25){
echo "<blockquote>&ldquo;Normal&rdquo;</blockquote>";
echo "- Berat badan anda masih ideal(normal), santai bro</p>";
}else if($bmi<27){
echo "<blockquote>&ldquo;Gendut&rdquo;</blockquote>";
echo "- Rajin-rajinlah berolahraga karena kamu termasuk Gendut</p>";
}else{
echo "<blockquote>&ldquo;Obesitas&rdquo;</blockquote>";
echo "- Hati-hati anda sudah masuk kategori OBESITAS...!!!, jaga pola makan anda dan rajinlah berolahraga</p>";
}
if($TB>=150){
$bbi = $bbn-($bbn*0.1);
}else {
    $bbi =$bbn-1;
}
echo "berat badan ideal kamu adalah $bbi <br> ";
$kb = $bbi*25;
if($usia=2){
$kb = $kb-($kb*0.05);
}else if ($usia = 3){
 $kb = $kb-($kb*0.1) ;
}else if($usia = 4){
$kb = $kb-($kb*0.2);
}else{
$kb = $kb;
}
if($aktivitas == "ringan"){
$kk = $kb + ($kb*0.2);
}else if($aktivitas == "sedang"){
$kk = $kb + ($kb*0.3);
}else{
$kk = $kb + ($kb*0.5);
}
echo " kebutuhan kalori kamu adalah <td> $kk </td>";
}
$pagi = $kk*0.2;
$siang = $kk*0.25;
$malam = $kk*0.25;
$ringan = $kk*0.1;
echo "<br> Kebutuhan kalori kamu <br>";
?>
    <form method="post" action="menu.php" target="ifme">
    <table border ="1px">
    <tr>
        <td>pagi</td>
        <td>: <input type="text" name="pagi" value="<?php echo $pagi; ?>" readonly></td>
    </tr>
        <tr>
        <td>makan ringan 1</td>
            <td>: <input type="text" name="ringan" value="<?php echo $ringan; ?>" raedonly</td>
        </tr>
    <tr>
        <td>siang</td>
        <td>: <input type="text" name="siang" value="<?php echo $siang; ?>" readonly</td>
        </tr>
     <tr>
        <td>makan ringan 2</td>
            <td>: <input type="text" name="ringan" value="<?php echo $ringan; ?>" readonly</td>
        </tr>
     <tr>
        <td>malam</td>
        <td>: <input type="text" name="malam" value="<?php echo $malam; ?>" readonly</td>
    </tr>
        <tr>
        <td>makan ringan 3</td>
            <td>: <input type="text" name="ringan" value="<?php echo $ringan; ?>" readonly</td>
        </tr>
        
    </table>
        <button type="submit">Proses</button>
    </form>
</body>
</html>