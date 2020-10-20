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


    }

?>