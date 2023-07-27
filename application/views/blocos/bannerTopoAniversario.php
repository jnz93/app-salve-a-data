<?php
    $meses = ["01"=>"Janeiro","02"=>"Fevereiro","03"=>"Março","04"=>"Abril","05"=>"Maio","06"=>"Junho","07"=>"Julho","08"=>"Agosto","09"=>"Setembro","10"=>"Outubro","11"=>"Novembro","12"=>"Dezembro"];
?>
<div id="home" class="d-none d-sm-block home-intro bgBanner"
style="background-image:url(<?=($config["bgTopo"] == "" ? base_url("templatesarq/aniversario/images/topopadrao.png") : $config["bgTopo"])?>) ;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="content">
                        <h2><span
                                class="color-highlight"><?=($config["headLine"] != "" ? $config["headLine"] : "Título principal")?></span>
                        </h2>
                        <p class="dataEvento"><?=date("d",strtotime($evento["dataInicio"]))?> de <?=$meses[date("m",strtotime($evento["dataInicio"]))]?> de <?=date("Y",strtotime($evento["dataInicio"]))?></p>

                    </div>
                </div>

            </div>

        </div>
    </div>

<div id="home" class="d-block d-sm-none home-intro bgBanner"
style="background-image:url(<?=($config["bgTopo"] == "" ? base_url("templatesarq/aniversario/images/topopadrao.png") : $config["bgTopoMobile"])?>) ;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="content">
                        <h2><span
                                class="color-highlight"><?=($config["headLine"] != "" ? $config["headLine"] : "Título principal")?></span>
                        </h2>
                        <p class="dataEvento"><?=date("d",strtotime($evento["dataInicio"]))?> de <?=$meses[date("m",strtotime($evento["dataInicio"]))]?> de <?=date("Y",strtotime($evento["dataInicio"]))?></p>

                    </div>
                </div>

            </div>

        </div>
    </div>

    