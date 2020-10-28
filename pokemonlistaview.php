<?php

    class PokeListaView{

        public static function geraLista($lista){

            echo "
            <form action='listagem.php' method='get'>
                <div class='row' style='background-color:#555555; color:#FFFFFF;'>
                    <div class='col-md-1'>

                    </div>
                    <div class='col-md-1 text-center'>
                        Código
                    </div>
                    <div class='col-md-4'>
                        Nome
                    </div>
                    <div class='col-md-1'>
                        Ataque
                    </div>
                    <div class='col-md-1'>
                        Defesa
                    </div>
                    <div class='col-md-2'>
                        Elemento
                    </div>
                    <div class='col-md-1'>
                        
                    </div>
                    <div class='col-md-1'>
                        
                    </div>
                </div>
            ";

            
            $cont = 0;

            foreach($lista as $pokemon){
                    $cont++;
                    $cor = "#BBBBBB";
                    if($cont%2 == 0){
                        $cor = "#DDDDDD";
                    }

                    $codigo = $pokemon->getCodigo();
                    $nome = $pokemon->getNome();
                    $descricao = $pokemon->getDescricao();
                    $ataque = $pokemon->getAtaque();
                    $defesa = $pokemon->getDefesa();
                    $elemento = $pokemon->getElemento();
                    $foto = $pokemon->getFoto();

                    echo "
                        <div class='row' style='background-color: $cor; border: 1px solid #AAAAAA;'>
                            <div class='col-md-1 semEspaco' style='padding-left: 0 !important; padding-right: 0 !important;'>
                                <button class='btn' type='submit' name='selPokemon' value= $codigo style='height:100%; width:100%; padding:0px!important;'>
                                    <img src= 'img/$foto' style='height:100%; width:100%;'>
                                </button> 
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center; justify-content: center;'>
                                <div>$codigo</div>
                            </div>
                            <div class='col-md-4' style='display:flex; align-items:center;'>
                                $nome
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center;'>
                                $ataque
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center;'>
                                $defesa
                            </div>
                            <div class='col-md-2' style='display:flex; align-items:center;'>
                                $elemento
                            </div>
                            <div class='col-md-1 semEspaco' style=''>
                                <button class='btn' type='submit' name='delPokemon' value= $codigo style='height:100%; background-color:transparent;'>
                                    <img src= 'img/delete.png' style='height:50%; width:50%;'>
                                </button> 
                            </div>
                            <div class='col-md-1 semEspaco' style=''>
                                <button class='btn' type='submit' name='selPokemon' value= $codigo style='height:100%; background-color:transparent;'>
                                    <img src= 'img/edit.png' style='height:50%; width:50%;'>
                                </button> 
                            </div>

                        </div>
                    ";


            }

            echo "</form>";


        }

    }



?>