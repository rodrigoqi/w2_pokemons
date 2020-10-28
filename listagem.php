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
                <h1>Listagem de Pokemons</h1>
            </div>
        
            <div class="col-md-12 text-center">

                <form method="get" action="listagem.php">
                    <div class="row">
                        <div class="col-md-1">
                            Filtro
                        </div>
                        <div class="col-md-4">
                            <input class="ajustavel" type="text" name="txtFiltro" value="">
                        </div>
                        <div class="col-md-2">
                            <select class="ajustavel" name="selTipoFiltro">
                                <option value="ataque">Ataque</option>
                                <option value="defesa">Defesa</option>
                                <option value="elemento">Elemento</option>
                                <option value="nome">Nome</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="ajustavel" name="selOrdenacao">
                                <option value="crescente">Crescente</option>
                                <option value="decrescente">Decrescente</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <input class="btn btn-primary" type="submit" name="btnFiltro" value="filtrar" style="padding:0px!important;">
                        </div>
                        <div class="col-md-1">
                            <input class="btn btn-danger" type="submit" name="btnFiltro" value="desfazer" style="padding:0px!important;">
                        </div>
                        <div class="col-md-1">
                            <input class="btn btn-success" type="submit" name="btnFiltro" value="inserir" style="padding:0px!important;">
                        </div>
                    </div>
                </form>
            </div>  
        </div> 

    </div>


</body>