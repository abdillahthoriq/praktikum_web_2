<?php 

	$animals = ["Babi", "Musang", "Ikan", "Burung"];
	echo $animals[0]; // Output: Kucing
	echo "<br>";
	echo $animals[2]; // Output: Ikan
	echo "<br>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<p>Nama-nama hewan</p>
	<ul>
		<?php
        
			foreach($animals as $hewan) {
                echo "<li> $hewan </li>";
            }
		?>
	</ul>
</body>
</html>