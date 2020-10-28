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
        include_once "pokemon.php";
        include_once "pokemonDAO.php";

        session_start();

        if(!isset($_SESSION["modo"])){
            $_SESSION["modo"] = 1;
        }

        $codigo = "";
        $nome = "";
        $descricao = "";
        $ataque = "";
        $defesa = "";
        $elemento = "";
        $foto = "";

        
        if(isset($_GET["botaoAcao"])){
            if($_GET["botaoAcao"]=="Gravar"){
                $codigo = null;
                $nome = $_GET["nome"];
                $descricao = $_GET["descricao"];
                $ataque = $_GET["ataque"];
                $defesa = $_GET["defesa"];
                $elemento = $_GET["elemento"];
                $foto = null;
                
                $pAux = new Pokemon(
                    $codigo,
                    $nome,
                    $descricao,
                    $ataque,
                    $defesa,
                    $elemento,
                    $foto
                );
                if($_SESSION["modo"]==1)
                    PokemonDAO::inserir($pAux);
                else
                    PokemonDAO::atualizar($pAux);
            } else if($_GET["botaoAcao"]=="Excluir"){
                PokemonDAO::excluir($_GET["nome"]);
            }



            //Coloca em modo de inserção caso for clicado no botão Excluir ou Inserir
            //Assim, a próxima vez que o botão gravar for clicado, sabemos se devemos
            //Inserir ou Atualizar o Pokemon. Além disso, também conseguimos saber se
            //devemos recarregar os valores dos inputs ou trazer somente vazio
            if(isset($_GET["botaoAcao"])){
                if($_GET["botaoAcao"]=="Excluir" || $_GET["botaoAcao"]=="Inserir"){
                    $_SESSION["modo"] = 1; //insercao
                } else {
                    $_SESSION["modo"] = 2; //atualização
                }
            }
            

        }

        if(isset($_GET["selPokemon"])){
            $pokemon = PokemonDAO::getPokemon($_GET["selPokemon"]);
            $nome = $pokemon->getNome();
            $descricao = $pokemon->getDescricao();
            $ataque = $pokemon->getAtaque();
            $defesa = $pokemon->getDefesa();
            $elemento = $pokemon->getElemento();
        }

        

    ?>


    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h1>Cadastro de Pokemons</h1>
            </div>
        </div>

        <form method="get" action="cadastro.php">

        <div class="row text-center">
            <div class="col-md-2 offset-md-2">
                <input type="submit" name="botaoAcao" value="Inserir" class="btn btn-primary"/>
            </div>
            <div class="col-md-2">
                <input type="submit" name="botaoAcao" value="Gravar" class="btn btn-success"/>
            </div>
            <div class="col-md-2">
                <input type="submit" name="botaoAcao" value="Excluir" class="btn btn-danger"/>
            </div>
            <div class="col-md-2">
                <input type="submit" name="botaoAcao" value="Cancelar" class="btn btn-warning"/>
            </div>
        </div>

        <br><br>
        <div class="row" id="areaCadastro">
            <div class="col-md-4 offset-md-4">
                <strong><label for="nome">Nome</label></strong>
                <input type="text" name="nome" value= <?php echo $nome; ?>   >
            </div>
            <div class="col-md-4 offset-md-4">
                <strong><label for="descricao">Descrição</label></strong>
                <input type="textarea" name="descricao" id="descricao" value= <?php echo $descricao; ?> >
            </div>
            <div class="col-md-4 offset-md-4">
                <strong><label for="ataque">Pontos de ataque</label></strong>
                <input type="text" name="ataque" value= <?php echo $ataque; ?> >
            </div>
            <div class="col-md-4 offset-md-4">
                <strong><label for="defesa">Pontos de Defesa</label></strong>
                <input type="text" name="defesa" value= <?php echo $defesa; ?> >
            </div>
            <div class="col-md-4 offset-md-4">
                <strong><label for="elemento">Elemento</label></strong>
                <input type="text" name="elemento" value= <?php echo $elemento; ?> >
            </div>
            <br>

        </div>

        </form>


    </div>


</body>