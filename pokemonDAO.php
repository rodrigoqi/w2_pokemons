<?php
    include "conexao.php";

    class PokemonDAO{
        private static $con = Conexao::getConexao();

        //Básico de uma classe DAO
        //inserir
        //atualizar
        //excluir

        public static function inserir($pokemon){
            $sql = self::$con->
                prepare("insert into pokemons values (null,?,?,?,?,?,null)");
            $sql->bindParam(1, $pokemon->getNome());
            $sql->bindParam(2, $pokemon->getDescricao());
            $sql->bindParam(3, $pokemon->getAtaque());
            $sql->bindParam(4, $pokemon->getDefesa());
            $sql->bindParam(5, $pokemon->getElemento());
            
            $sql->execute();
        }


    }

?>