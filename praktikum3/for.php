<?php 
    // Mencetak angka 1 sampai 10 menggunakan for 
    
    for($i=1; $i <= 10; $i++){
            echo $i;
        ?>
            <br>
        <?php
    }

    // Membuat array 

    $buah = ['mangga', 'apel', 'alpukat', 'pepaya'];

    foreach($buah as $b) {
        echo $b . '<br>' ;
    }
?>