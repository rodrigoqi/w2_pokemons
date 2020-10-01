<!DOCTYPE html>
<html lang="pt-br">

<head>
	<!--Tags básicas do head-->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Arrays em PHP</title>
	<!--Link dos nossos arquivos CSS e JS padrão-->
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="js/scripts.js"></script>
	<!--Link dos arquivos CSS e JS do Bootstrap-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>

<body>
	<div class="container">

		<div class="row text-center">
			<div class="col-md-12">

				<?php
				include "pokemon.php";

				$p1 = new Pokemon(
					"Arceus",
					"Simplesmente o criador de tudo, Arceus é como um Deus no universo de Pokémon. Assim que ele nasceu, Arceus criou tudo a sua volta, como tempo e espaço, e deixou o “Trio da Criação” encarregado de cuidar disso. Curiosamente havia uma forma de capturar Arceus planejada para Pokémon Diamond & Pearl, porém a Nintendo nunca a lançou por achá-la complicada demais e apenas o distribuiu em raras ocasiões em eventos especiais.",
					"arceus.jpg",
					250,
					50
				);

				$p1->setNome("Alceu");
				$p1->setAtaque(350);

				echo "<img src=img/" . $p1->getFoto() . "><br>";
				echo $p1->__toString();
				
				?>


			</div>
		</div>


	</div>
</body>

</html>