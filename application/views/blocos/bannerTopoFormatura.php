<?php
    $meses = ["01"=>"Janeiro","02"=>"Fevereiro","03"=>"Março","04"=>"Abril","05"=>"Maio","06"=>"Junho","07"=>"Julho","08"=>"Agosto","09"=>"Setembro","10"=>"Outubro","11"=>"Novembro","12"=>"Dezembro"];
?>
<div id="home" class="d-none d-sm-block home-intro bgBanner"
    style="background-image:url(<?=($config["bgTopo"] == "" ? base_url("templatesarq/aniversario/images/topopadrao.png") : $config["bgTopo"])?>) ;">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12 col-sm-12 col-xs-12 topoPrincipal">
                <div class="content">
                    <h2 class="titlePrincipal"><span
                            class="color-highlight"><?=($config["headLine"] != "" ? $config["headLine"] : "Título principal")?></span>
                    </h2>
                    <ul>
                        <li class="dataEvento"><?=date("d",strtotime($evento["dataInicio"]))?> de <?=$meses[date("m",strtotime($evento["dataInicio"]))]?> de <?=date("Y",strtotime($evento["dataInicio"]))?></li>
                        <li><a href="#presenca"
                                class="button iniCadastro"><?=($config["textoBtHeadLine"] != "" ? $config["textoBtHeadLine"] : "Confirmar presença")?></a>
                        </li>

                    </ul>
                    
                </div>
            </div>

        </div>

    </div>
</div>

<div id="home" class="d-blocl d-sm-none home-intro bgBanner"
    style="background-image:url(<?=($config["bgTopo"] == "" ? base_url("templatesarq/aniversario/images/topopadrao.png") : $config["bgTopoMobile"])?>) ;">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12 col-sm-12 col-xs-12 topoPrincipal">
                <div class="content">
                    <h2 class="titlePrincipal"><span
                            class="color-highlight"><?=($config["headLine"] != "" ? $config["headLine"] : "Título principal")?></span>
                    </h2>
                    <ul>
                        <li class="dataEvento"><?=date("d",strtotime($evento["dataInicio"]))?> de <?=$meses[date("m",strtotime($evento["dataInicio"]))]?> de <?=date("Y",strtotime($evento["dataInicio"]))?></li>
                        <li><a href="#presenca"
                                class="button iniCadastro"><?=($config["textoBtHeadLine"] != "" ? $config["textoBtHeadLine"] : "Confirmar presença")?></a>
                        </li>

                    </ul>
                    
                </div>
            </div>

        </div>

    </div>
</div>