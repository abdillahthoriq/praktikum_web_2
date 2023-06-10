<?php 
	/* 
		Array:

		Variable yang bisa menampung lebih dari satu nilai.
		Menggunakan tanda [] untuk membuat array.
		Bisa berisikan data dengan jenis berbeda - beda. 
		Cara mengakses isi array bisa menggunakan index.

	*/
	
	$animals = ["nama"=>"Kangguru", "Musang", "Ikan", "Burung"];
	echo $animals[0]; // Output: Kucing
	echo "<br>";
	echo $animals['nama']; // Output: Ikan
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
			foreach($animals as $hewan): ?>
				<li><?= $hewan; ?></li>
		<?php endforeach; 	
		?>	
	</ul>
</body>
</html>