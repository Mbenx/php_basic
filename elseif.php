<?php
    $a = "Hijau";
    $b = 100;

    if ($a == $b) {
        echo "Kondisi Pertama";
    }   elseif ($a == $b) {
        echo "Kodisi Kedua";
    }   elseif ($a xor $b) {
        echo "Kondisi Ketiga";
    }   else {
        echo "Kondisi Salah";
    }

    // ==  | sama dengan
    // !=  | tidak sama dengan
    // <   | kurang dari
    // >   | besar dari
    // <=  | kurang dari atau sama dengan
    // >=  | besar dari atau sama dengan
    // &&  | fungsi "AND" - keduanya harus add
    // ||  | fungsi "OR" - salah satu ada sudah benar
?>