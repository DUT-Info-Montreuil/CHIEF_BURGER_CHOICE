<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" href="style.css"/>
	<title>Chief Burger Choice</title>
</head>


<body>
	<header>
		<?php echo $menu->affiche()."<br/>";?>
	</header>
	
	<main>	
		<?php							
			echo $mod->controleur->getVue()->getTampon();
		?>
	</main>

	<footer>
		<p>Creative commons licence - Site realisé par Boulaye Seydi, 2022.</p>
	</footer>

</body>
</html>
