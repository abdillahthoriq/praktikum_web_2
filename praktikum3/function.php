    <?php 
    
        //  Function Menghitung umur 

        function hitungUmur($thn_lahir){
            $tahunSekarang = 2023;

            // menghitung umur 
            $umur = $tahunSekarang - $thn_lahir ;

            return $umur;
        }

        echo 'umur saya adalah ' . hitungUmur(2002) . 'tahun';
    ?>