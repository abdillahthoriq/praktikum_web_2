<?php
    $grade = 1 + 2 + 3;
    $hasil_grade = 3 * $grade;

    switch($hasil_grade >= 10){
        case 18 :
            $nilai = "Sangat Memuaskan";
            break;
        case 40 :
            $nilai = "Memuaskan";
            break;
        case 50 : 
            $nilai = "Baik";
        case 60 :
            $nilai = "Cukup";
            break;
        default:
        $nilai = "Tidak Ada";
        break;
    }
    echo $nilai;
    $hasil_grade++;
?>