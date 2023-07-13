<?php 
    if(isset($_POST['kirim'])){
        $nim = htmlspecialchars($_POST['nim']);
        $nama = htmlspecialchars($_POST['nama']);
        $jk = htmlspecialchars($_POST['jenis_kelamin']);
        $studi = htmlspecialchars($_POST['program_studi']);
        $domisili = htmlspecialchars($_POST['domisili']);
        $email = htmlspecialchars($_POST['email']);
    }

// Tentukan nilai untuk setiap opsi skill
$skillValues = [
    'HTML' => 10,
    'CSS' => 10,
    'JavaScript' => 20,
    'Bootstrap' => 20,
    'PHP' => 30,
    'Python' => 30,
    'Java' => 50,
];



    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap-5.3.0/css/bootstrap.min.css">
</head>
    <style>
        .row{
            margin-bottom: 15px;
        }
    </style>
<body class="m-1">
    
    <div class="container">
        <form action="" method="post">
            <h1 class="text-center mb-3">Form Regisrasi IT Club Science</h1>
            <div class="row">
                <label for="nama" class="col-4">NIM</label>
                <div class="form-group col-8">
                    <input type="text" id="nama" class="form-control" name="nim">
                </div>
            </div>
            <div class="row">
                <label for="namalengkap" class="col-4">Nama Lengkap</label>
                <div class="col-8">
                    <input type="text" id="namalengkap" name="nama" class="form-control">
                </div>
            </div>
            <div class="row">
                <label class="col-4">Jenis Kelamin</label>
                <div class="col-8">
                    <input type="radio" name="jenis_kelamin" id="lakilaki" value="Laki - Laki">
                    <label for="lakilaki">Laki - Laki</label>
                    <input type="radio" name="jenis_kelamin" id="perempuan" value="perempuan">
                    <label for="perempuan">Perempuan</label>
                </div>
            </div>
            <div class="row">
                <label for="programstudi" class="col-4">Program Studi</label>
                <div class="col-8">
                    <select name="program_studi" id="programstudi" class="form-control">
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Teknik Sistem Informasi">Sistem Informasi</option>
                        <option value="Multimedia">Multimedia</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <label for="skillweb" class="col-4">Skill Web & Programming</label>
                <div class="col-8 d-flex">
                    <input type="checkbox" name="Skill_Programming[]" id="skillweb" class="me-2" value="HTML">
                    <label for="skillweb" class="me-2">HTML</label>
                    <input type="checkbox" name="Skill_Programming[]" id="skillweb" class="me-2" value="CSS">
                    <label for="skillweb" class="me-2">CSS</label>
                    <input type="checkbox" name="Skill_Programming[]" id="skillweb" class="me-2" value="JavaScript">
                    <label for="skillweb" class="me-2">JavaScript</label>
                    <input type="checkbox" name="Skill_Programming[]" id="skillweb" class="me-2" value="RWD Bootstrap">
                    <label for="skillweb" class="me-2">RWD Bootstrap</label>
                    <input type="checkbox" name="Skill_Programming[]" id="skillweb" class="me-2" value="PHP">
                    <label for="skillweb" class="me-2">PHP</label>
                    <input type="checkbox" name="Skill_Programming[]" id="skillweb" class="me-2" value="Python">
                    <label for="skillweb" class="me-2">Python</label>
                    <input type="checkbox" name="Skill_Programming[]" id="skillweb" class="me-2" value="Java">
                    <label for="skillweb" class="me-2">Java</label>
                    
                </div>
            </div>
            <div class="row">
                <label for="domisili" class="col-4">Tempat Tinggal</label>
                <div class="col-8">
                    <input type="text" name="domisili" id="domisili" class="form-control">
                </div>
            </div>  
            <div class="row">
                <label for="emai" class="col-4">Email</label>
                <div class="col-8">
                    <input type="text" id="email" class="form-control" name="email"> 
                </div>
            </div>
            <div class="container col-8 me-1"> 
            <button type="submit" name="kirim" class=" d-block mt-5 bg-primary border-0 text-white p-2 rounded">Submit</button>
            </div>
        </form>

        <hr>

        <?php
            echo 'NIM :' ." ". " " . $nim . '<br>';
            echo 'Nama :' . " " . $nama . '<br>' ;
            echo 'Jenis Kelamin :' ." " . $jk . '<br>';
            echo 'Program Studi :' . " " . $studi . '<br>';
            if (isset($_POST['Skill_Programming'])) {
                echo 'Skill: ';
            
                $selectedSkills = $_POST['Skill_Programming'];
                $skillCount = count($selectedSkills);
                foreach ($selectedSkills as $index => $skill) {
                    echo htmlspecialchars($skill);
            
                    if ($index < $skillCount - 1) {
                        echo ', ';
                    }
                }
                echo '.';
            } else {
                echo 'Skill: Tidak ada skill yang dipilih.<br>';
            }
            echo '<br>';
            if (isset($_POST['Skill_Programming'])) {
                $selectedSkills = $_POST['Skill_Programming'];
            
                $totalScore = 0;
            
                foreach ($selectedSkills as $skill) {
                    if (isset($skillValues[$skill])) {
                        $totalScore += $skillValues[$skill];
                    }
                }
            
                echo "Total Skor Skill: " . $totalScore;
            }
            echo '<br>';
            echo "Kategori Skill: ";
    if ($totalScore >= 0 && $totalScore < 40) {
        echo "Tidak memadai";
    } elseif ($totalScore >= 40 && $totalScore < 60) {
        echo "Kurang";
    } elseif ($totalScore >= 60 && $totalScore < 100) {
        echo "Cukup";
    } elseif ($totalScore >= 100 && $totalScore < 150) {
        echo "Baik";
    } elseif ($totalScore >= 150) {
        echo "Sangat baik";
    }
            echo '<br>';
            echo 'Email :' . " " . $email ;
        ?>

    </div>

    <script src="../bootstrap-5.3.0/js/bootstrap.min.js"></script>
</body>
</html> 