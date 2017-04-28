<?php
$nama = $_POST['nama'];
$BB = $_POST['berat_badan'];
$TB = $_POST['tinggi_badan'];
$usia = $_POST['usia'];
$gender = $_POST['gender'];
$aktivitas = $_POST['aktivitas'];

function hitungBMI ($BB,$TB,$jender){
    if($TB>3) $TB=$TB/100;
    $bmi=$BB/($TB*$TB);
    if($jender=='laki-laki' and $bmi<17){
        echo "kurus";
    }else if($jender=='laki-laki' and $bmi<23){
        echo "normal";
    }else if($jender=='laki-laki' and $bmi <27){
        echo "gemuk";
    }else if($jender=='perempuan' and $bmi<18){
        echo "kurus";
    }else if($jender=='perempuan' and $bmi<25){
        echo "normal";
    }else if($jender=='perempuan' and $bmi<27){
        echo "gemuk";
    }else{
        echo "obesitas";
    }
    echo"<br>";
    return $bmi;
}

function beratBadanNormal($tb){
    global $bbn;
    $bbn = $tb-100;
    return $bbn;
}

function beratbadanIdeal($jender,$tb,$bbn){
    global $bbi;
    if ($jender=='laki-laki' and $tb>=160){
        $bbi = $bbn-($bbn* 0.1);
    }else if($jender=='perempuan' and $tb>=150){
        $bbi = $bbn-($bbn*0.1);
    }else{
        $bbi = $bbn-1;
    }
    return $bbi;
}

function kebutuhanKalori($jender,$usia,$aktivitas,$bbi){
    global $kk;
    if($jender=='laki-laki'){
        $kk = $bbi*30;
    }else{
        $kk = $bbi*25;
    }
    
    if($usia>39 && $usia<60){
        $kk=$kk-($kk*0.05);
    }else if($usia<70){
        $kk=$kk-($kk*0.1);
    }else{
        $kk=$kk-($kk*0.2);
    }
    
    if($aktivitas=='ringan'){
        $kk=$kk+($kk*0.2);
    }else if($aktivitas=='sedang'){
        $kk=$kk+($kk*0.3);
    }else{
        $kk=$kk+($kk*0.5);
    }
    return $kk;
}

function pembagianKalori($kk){
    global $pagi;
    global $siang;
    global $malam;
    global $ringan;
    
    $pagi = $kk*0.2;
    $siang = $kk*0.25;
    $malam = $kk*0.25;
    $ringan =$kk*0.1;
    
    echo "makan pagi = $pagi<br>";
    echo "makan ringan 1 = $ringan<br>";
    echo "makan siang = $siang<br>";
    echo " makan ringan 2 = $ringan<br>";
    echo "makan malam = $malam<br>";
    echo "makan ringan 3 = $ringan<br>";
    
}

echo "BMI kamu = ".hitungBMI($BB,$TB,$gender)."<br>";
echo "berat badan normal = ".beratBadanNormal($TB)."<br>";
echo "berat badan ideal = ".beratBadanIdeal($gender,$TB,$bbn)."<br>";
echo "kebutuhan kalori sehari = ".kebutuhanKalori($gender,$usia,$aktivitas,$bbi)."<br>";
echo "pembagian kalori = <br>";
echo pembagianKalori ($kk);

echo "<a href='menu.php?pagi=$pagi&siang=$siang&malam=$malam&ringan=$ringan&mulai=1&akhir=1'>saran menu makanan</a>";
?>
