<?php
    $grade = "A";

    switch($grade){
        case 'A' :
            $nilai = "Sangat Memuaskan";
            break;
        case 'B' :
            $nilai = "Memuaskan";
            break;
        case 'C' : 
            $nilai = "Baik";
        case 'D' :
            $nilai = "Cukup";
            break;
        default:
        $nilai = "Tidak Ada";
        break;
    }
    echo $nilai;
?>