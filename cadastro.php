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
        include_once "imagem.php";

        session_start();

        if(isset($_SESSION["logado"])){
            if($_SESSION["logado"]==false){
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }

        if(!isset($_SESSION["modo"])){
            $_SESSION["modo"] = 1;
        }


        $codigo = "";
        $nome = "";
        $descricao = "";
        $ataque = "";
        $defesa = "";
        $elemento = "";
        $foto = "semfoto.jpg";

        
        if(isset($_POST["botaoAcao"])){
            if($_POST["botaoAcao"]=="Gravar"){
                $codigo = null;
                $nome = $_POST["nome"];
                $descricao = $_POST["descricao"];
                $ataque = $_POST["ataque"];
                $defesa = $_POST["defesa"];
                $elemento = $_POST["elemento"];
                $arquivo = $_FILES["fileFoto"];
                if($arquivo!="" && $arquivo!=null)
                    $foto = Imagem::uploadImagem($arquivo, 2000, 2000, 5000, "img/"); 
                else
                    $foto = "";
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
            } else if($_POST["botaoAcao"]=="Excluir"){
                PokemonDAO::excluir($_POST["nome"]);
            }



            //Coloca em modo de inserção caso for clicado no botão Excluir ou Inserir
            //Assim, a próxima vez que o botão gravar for clicado, sabemos se devemos
            //Inserir ou Atualizar o Pokemon. Além disso, também conseguimos saber se
            //devemos recarregar os valores dos inputs ou trazer somente vazio
            if(isset($_POST["botaoAcao"])){
                if($_POST["botaoAcao"]=="Excluir" || $_POST["botaoAcao"]=="Limpar"){
                    $_SESSION["modo"] = 1; //insercao
                } 
                else if($_POST["botaoAcao"]=="Cancelar"){
                    header("Location: listagem.php");
                } else {
                    $_SESSION["modo"] = 2; //atualização
                }
            }
            

        }

        if(isset($_POST["selPokemon"])){
            $pokemon = PokemonDAO::getPokemon($_POST["selPokemon"]);
            $nome = $pokemon->getNome();
            $descricao = $pokemon->getDescricao();
            $ataque = $pokemon->getAtaque();
            $defesa = $pokemon->getDefesa();
            $elemento = $pokemon->getElemento();
            $foto = $pokemon->getFoto();
            $_SESSION["modo"] = 2;
        } else {
            $_SESSION["modo"] = 1;
        }


    ?>


    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h1>Cadastro de Pokemons</h1>
            </div>
        </div>

        <form method="post" action="cadastro.php" enctype="multipart/form-data">

        <div class="row text-center">
            <div class="col-md-2 offset-md-2">
                <input type="submit" name="botaoAcao" value="Gravar" class="btn btn-success"/>
            </div>
            <div class="col-md-2">
                <input type="submit" name="botaoAcao" value="Excluir" class="btn btn-danger"/>
            </div>
            <div class="col-md-2">
                <input type="submit" name="botaoAcao" value="Cancelar" class="btn btn-warning"/>
            </div>
            <div class="col-md-2">
                <input type="submit" name="botaoAcao" value="Limpar" class="btn btn-primary"/>
            </div>
        </div>

        <br><br>
        <div class="row" id="areaCadastro">
            <div class="col-md-4 offset-md-4">
                <img src="img/<?php echo $foto;?>" style="width:100%; height:100%;">  
            </div>
            <div class="col-md-4 offset-md-4">
                <input type="file" name="fileFoto">
            </div>
            <div class="col-md-4 offset-md-4">
                <strong><label for="nome">Nome</label></strong>
                <input type="text" name="nome" value= <?php echo "$nome"; ?>   >
            </div>
            <div class="col-md-4 offset-md-4">
                <strong><label for="descricao">Descrição</label></strong>
                <textarea name="descricao" rows="8" wrap="hard" style="width: 100%;"><?php echo "$descricao";?></textarea> 
            </div>
            <div class="col-md-4 offset-md-4">
                <strong><label for="ataque">Pontos de ataque</label></strong>
                <input type="text" name="ataque" value= <?php echo "$ataque"; ?> >
            </div>
            <div class="col-md-4 offset-md-4">
                <strong><label for="defesa">Pontos de Defesa</label></strong>
                <input type="text" name="defesa" value= <?php echo "$defesa"; ?> >
            </div>
            <div class="col-md-4 offset-md-4">
                <strong><label for="elemento">Elemento</label></strong>
                <input type="text" name="elemento" value= <?php echo "$elemento"; ?> >
            </div>
            <br>

        </div>

        </form>


    </div>

    <?php var_dump($_SESSION["modo"]); ?>


</body>