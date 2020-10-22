<?php
    include "conexao.php";

    class PokemonDAO{
        
        //Básico de uma classe DAO
        //inserir
        //atualizar
        //excluir

        public static function inserir($pokemon){
            $con = Conexao::getConexao();
            $sql = $con->
                prepare("insert into pokemons values (null,?,?,?,?,?,null)");
            
            $nome = $pokemon->getNome();
            $descricao = $pokemon->getDescricao();
            $ataque = $pokemon->getAtaque();
            $defesa = $pokemon->getDefesa();
            $elemento = $pokemon->getElemento();
            
            $sql->bindParam(1, $nome);
            $sql->bindParam(2, $descricao);
            $sql->bindParam(3, $ataque);
            $sql->bindParam(4, $defesa);
            $sql->bindParam(5, $elemento);
            
            $sql->execute();
        }

        //Quero que o excluir possa funcionar de 3 formas:
            //Recebendo um pokemon
            //Recebendo o nome do pokemon
            //Recebendo o código do pokemon
        public static function excluir($pokemon){
            $con = Conexao::getConexao();
           
            $sql = null;
            if(is_numeric($pokemon)){
                $sql=$con->prepare("delete from pokemons where codigo = ?");
                $sql->bindParam(1, $pokemon);
            } else if(is_string($pokemon)){
                $sql=$con->prepare("delete from pokemons where nome = ?");
                $sql->bindParam(1, $pokemon);
            } else {
                $nome = $pokemon->getNome();
                $sql=$con->prepare("delete from pokemons where nome = ?");
                $sql->bindParam(1, $nome);
            }
            $sql->execute();  
        }

        public static function atualizar($pokemon){
            $con = Conexao::getConexao();
            $sql = $con->prepare("update pokemons set nome=?, descricao=?, 
                ataque=?, defesa=?, elemento=?, foto=? where codigo=?");
            
            $nome = $pokemon->getNome();
            $descricao = $pokemon->getDescricao();
            $ataque = $pokemon->getAtaque();
            $defesa = $pokemon->getDefesa();
            $elemento = $pokemon->getElemento();
            $foto = "";
            $codigo = $pokemon->getCodigo();

            $sql->bindParam(1, $nome);
            $sql->bindParam(2, $descricao);
            $sql->bindParam(3, $ataque);
            $sql->bindParam(4, $defesa);
            $sql->bindParam(5, $elemento);
            $sql->bindParam(6, $foto);
            $sql->bindParam(7, $codigo);

            $sql->execute();
            
        }

        //Ao dar um get pokemon (localizando o pokemon no banco e devolvendo uma instancia)
        //queremos que se possa usar ou o código ou o nome
        public static function getPokemon($identificacao){
            $con = Conexao::getConexao();
            $sql = null;

            if(is_numeric($identificacao)){
                $sql = $con->prepare("select * from pokemons where codigo=?");
                $sql->bindParam(1, $identificacao);
            } else {
                $sql = $con->prepare("select * from pokemons where nome=?");
                $sql->bindParam(1, $identificacao);
            }

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();

            $pokemon = null;
            if($registro = $sql->fetch()){
                $pokemon = new Pokemon(
                    $registro["codigo"],
                    $registro["nome"],
                    $registro["descricao"],
                    $registro["ataque"],
                    $registro["defesa"],
                    $registro["elemento"],
                    $registro["foto"]
                );
            }

            return $pokemon;

        }

        public static function getPokemons($campo, $ordem){
            $con = Conexao::getConexao();
            $sql = $con->prepare("select * from pokemons order by ? ?");
            $sql->bindParam(1, $campo);
            $sql->bindParam(2, $ordem);
            
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();

            $pokeLista = array();

            while($registro = $sql->fetch()){
                $pokemon = new Pokemon(
                    $registro["codigo"],
                    $registro["nome"],
                    $registro["descricao"],
                    $registro["ataque"],
                    $registro["defesa"],
                    $registro["elemento"],
                    $registro["foto"]
                );
                $pokeLista[] = $pokemon;
            }

            return $pokeLista;
        }


    }

?>