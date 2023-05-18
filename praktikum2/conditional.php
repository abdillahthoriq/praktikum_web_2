<?php
    $total_nilai = 90;
    $status = "Lulus";

    if($total_nilai >= 50){
        echo  $status;
    }else{
        echo "Tidak Lulus";
    }

    echo "<br>";
    echo "<br>";
    echo "<br>";

    $grade;
    if($total_nilai >= 90){
        $grade = "A";
    }elseif($total_nilai >= 80){
        $grade = "B";
    }elseif($total_nilai >= 70){
        $grade = "C";
    }elseif($total_nilai <= 100){
        $grade = "E";
    }else{
        $grade = "Z";
    }
    echo $grade;
?>