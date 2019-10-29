<?php
    $merk_mobil = ["BMW","TOYOTA","NISSAN"];
    //untuk munculkan 1 1 isi array
    echo $merk_mobil [0],"<br>";
    echo $merk_mobil [1],"<br>";
    echo $merk_mobil [2],"<br>";

    //munculkan isi array dengan cara looping
    $panjang_array = count($merk_mobil);
    echo $panjang_array,"<br>";

    for ($i=0; $i < $panjang_array ; $i++) { 
        echo $merk_mobil [$i]; // fungsi [$i] dipakai untuk pentujuk alamat array
        echo "<br>";
    }
    $a = 0;
    while ($a < $panjang_array) {
        echo $merk_mobil[$a];
        echo "<br>";
        $a++;
    }
?>