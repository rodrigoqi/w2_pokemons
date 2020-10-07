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

	<?php
	include "pokemon.php";
	include "pokemonview.php";

	$p1 = new Pokemon(
		"Arceus",
		"Simplesmente o criador de tudo, Arceus é como um Deus no universo de Pokémon. Assim que ele nasceu, Arceus criou tudo a sua volta, como tempo e espaço, e deixou o “Trio da Criação” encarregado de cuidar disso. Curiosamente havia uma forma de capturar Arceus planejada para Pokémon Diamond & Pearl, porém a Nintendo nunca a lançou por achá-la complicada demais e apenas o distribuiu em raras ocasiões em eventos especiais.",
		"arceus.jpg",
		1500,
		2000
	);

	$p2 = new Pokemon(
		"Celebi",
		"Inicialmente considerado como “O Mew da geração Gold & Silver” pois só podia ser obtido em eventos, Celebi provou-se um tipo diferente de pokémon lendário, um pouco mais simples em objetivo porém ainda poderoso. Ele é um guardião de florestas que procura sempre protegê-las e para isso pode até mesmo viajar no tempo, o que parece um pouco exagerado.",
		"celebi.jpg",
		190,
		120
	);

	$p3 = new Pokemon(
		"Heatran",
		"Ao considerar a importância de Heatran, é estranho imaginar o quanto ele fica em segundo plano em Pokémon Diamond & Pearl. Ele representa o núcleo do planeta Terra e é tão velho quanto o “Trio da Criação”, porém simplesmente não ganhou muito destaque nem nos jogos nem na série animada. Ele possui uma particularidade no entanto, já que é o único pokémon lendário que pode ser encontrado em diferentes gêneros, macho ou fêmea.",
		"heatran.jpg",
		250,
		80
	);


	?>

	<div class="container">
		<div class="row text-center" id="titulo">
			<div class="col-md-12">
				<h1>Pokemons Lendários</h1>
			</div>
		</div>	


		<div class="row text-center">

			<?php

			$pkView = new PokemonView();
			$pkView->gerarCard($p1);
			$pkView->gerarCard($p2);
			$pkView->gerarCard($p3);
			$pkView->gerarCard($p1);
			$pkView->gerarCard($p2);
			$pkView->gerarCard($p3);




			?>


		</div>
	</div>
</body>

</html>