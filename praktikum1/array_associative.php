<?php 

/* 
    Array Associative:

    Terdiri dari key & value 
    Key &  Value dipisahkan dengan tanda =>
    Cara mengakses value menggunakan key nya 
*/
    $mahasiswa = [
        "nama" => "Abdillah Thoriq",
        "umur" => "21",
        "alamat" => "cibinong"
    ];
?>
<!DOCTYPE html>
<html lang="id">
    <head>
            <title>Array Associative</title>    
    </head>
    <body>
        <table border="1" padding="3" width="250" text-align="center">
            <tr text-align="center">
                <th>Nama</th>
                <th>Umur</th>
                <th>Alamat</th>
            </tr>
            <tr text-align="center">
                <td><?php echo $mahasiswa['nama'] ?></td>
                <td><?php echo $mahasiswa['umur'] ?></td>
                <td><?php echo $mahasiswa['alamat'] ?></td>
            </tr>
         </table>
    </body>
</html> 