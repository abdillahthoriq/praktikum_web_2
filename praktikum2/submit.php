<?php 
$nama = $_POST["nama"];
$matkul = $_POST["matkul"];
$nilai_uts = $_POST["nilai_uts"];
$nilai_uas = $_POST["nilai_uas"];
$nilai_tugas = $_POST["nilai_tugas"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">NAMA</th>
        <th scope="col">MATKUL</th>
        <th scope="col">NILAI UTS</th>
        <th scope="col">NILAI UAS</th>
        <th scope="col">NILAI TUGAS</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $nama; ?></td>
            <td><?php echo $matkul; ?></td>
            <td><?php echo $nilai_uts; ?></td>
            <td><?php echo $nilai_uas; ?></td>
            <td><?php echo $nilai_tugas; ?></td>
        </tr>
    </tbody>
    </table>
</body>
</html>