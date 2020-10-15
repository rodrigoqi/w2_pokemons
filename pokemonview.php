<?php

    class PokemonView{

        public static function gerarCard($pokemon){
            $nomePokemon = $pokemon->getNome();
            $descricaoPokemon = $pokemon->getDescricao();
            $fotoPokemon = $pokemon->getFoto();
            $ataquePokemon = $pokemon->getAtaque();
            $defesaPokemon = $pokemon->getDefesa();
           
            echo "
            <div class='col-md-4' style='margin-top: 20px;'>
                <div class='img-thumbnail' style='background-color: rgba(0,0,0,0.9); color: white;'>
                    <img src='img/$fotoPokemon' style='width: 100%; height: 100%;'>
                    <div class='caption'>
                        <br>
                        <h2 style='font-size: 1.5em;'>$nomePokemon</h2>
                        <br>
                        <p style='font-size:0.8em; text-align: justify; height: 150px;'>$descricaoPokemon</p>
                        <br>
                        <p style='color: deeppink; '>Pontos de ataque: $ataquePokemon</p>
                        <p style='color: gold; '>Pontos de defesa: $defesaPokemon</p>
                    </div>
                </div>
            </div>
        
           ";

        }
    }
?>