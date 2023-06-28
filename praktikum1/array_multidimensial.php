
<?php
    $mahasiswa = [
        ['Abdillah' , 'teknik informatika'],
        ['Budi' , 'akutansi'],
        ['Cepi' , 'vokasi'],
        ['Dandi' , 'sastra inggris']
    ];

    foreach($mahasiswa as $mhs) : 
        echo "Nama :"." ".$mhs[0]."<br>";
        echo "Jurusan :"." ".$mhs[1]."<br>";
    ?>
        
    <?php endforeach; ?>
