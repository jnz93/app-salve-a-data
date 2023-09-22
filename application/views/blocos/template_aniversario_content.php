<?php $this->load->view("sites/template_aniversario_nav")?>
<!-- end navbar -->

<!-- home intro -->
<?php $this->load->view("blocos/bannerTopoAniversario")?>
<!-- end home intro -->

<div id="portfolio" class="portfolio section-bottom-only">
    <div class="container">
        <div class="section-title textoPadrao">
            <h3 class="titleCentro"><?=$introducao["titulo"]?></h3>
        </div>

        <div class="row no-gutters filter-container">
            <div class="row" style="width: 100%;     margin: 0;">
                <div class="col-12 text-center textoPadrao">
                    <?=$introducao["texto"]?>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
    if($evento["contagemRegressiva"]){
        ?>
<div id="clock" class="portfolio section-bottom-only">
    <div class="container">
        <div class="section-title">
            <!-- <h3 class="titleCentro"><?=$introducao["titulo"]?></h3> -->
        </div>
        <?php $this->load->view("blocos/clock")?>
    </div>
</div>
<?php
    }
    ?>

<div id="sobre" class="portfolio section-bottom-only">
    <div class="container">

        <div class="row no-gutters filter-container">
            <?php
                    foreach($protagonistas as $protagonista){
                        ?>
            <div class="row">
                <div class="col-12 col-sm-4">
                    <img src="<?=($protagonista["foto"] != "" ? $protagonista["foto"] : base_url("assets/images/users/avatar-2.jpg"))?>"
                        class="imgSobre">
                </div>
                <div class="col-12 col-sm-8  textoSobre">
                    <h2 class="tituloSobre">Sobre <?=$protagonista["firstName"]?></h2>
                    <p><?=$protagonista["descricao"]?></p>

                </div>
            </div>

            <?php
                    }
                ?>

        </div>

    </div>
</div>

<div id="process-work" class="process-work section imgSection bgBanner bannerMensagens">
    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <div class="">
                    <h3 class="titleDireito">
                        <?=($config["titMsg"] != "" ? $config["titMsg"] : "Mensagens")?> </h3>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php if(empty($mensagens)) : ?>
                                <div class="carousel-item active">
                                    <p class="descricaoMensagem"></p>
                                </div>
                            <?php else : ?>
                                <?php foreach($mensagens as $i=>$mensagem){ ?>
                                    <div class="carousel-item <?=($i > 0 ? "" : "active")?>">
                                        <p class="descricaoMensagem"><?=$mensagem["mensagem"]?></p>
                                        <p class="descricaoMensagem">Ass: <?=$mensagem["nome"]?></p>
                                    </div>
                                <?php } ?>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>



                    <ul>
                        <li><a href="#"
                                class="button btTransparente abreMensagem"><?=($config["textoBtMsg"] != "" ? $config["textoBtMsg"] : "Deixar Mensagem")?></a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>

<div id="fotos" class="portfolio section-bottom-only">
    <div class="container">
        <div class="section-title">
            <h3 class="titleCentro"> <?=($config["textoMidias"] != "" ? $config["textoMidias"] : "Álbum de memórias")?></h3>
        </div>
        <?php $this->load->view("blocos/album")?>

    </div>
</div>

<div id="presenca" class="process-work section imgSection bgBanner">
    <div class="container">
        <div class="row">

            <div class="col-12 col-sm-6 text-center fundoListaPresente">
                <div class="">
                    <h3 class="titleDireito">
                        <?=($config["titLista"] != "" ? $config["titLista"] : "Confira a lista de presentes e demonstre todo o seu carinho!")?>
                    </h3>

                    <ul>
                        <li><a href="<?=base_url("lista/".$evento["slug"])?>"
                                class="button iniCadastro btTransparente"><?=($config["textoBtLista"] != "" ? $config["textoBtLista"] : "Confira a lista")?></a>
                        </li>

                    </ul>

                </div>
            </div>
            <div class="col-12 col-sm-6 text-center">
                <h2 class="tituloSobre">Confirmar presença</h2>
                <?php $this->load->view("blocos/formPresenca")?>
            </div>
        </div>

    </div>
</div>
</div>

<!-- about us -->
<div id="endereco" class="about">
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12 boxTextoCentro">
                <?php 
                    $mapa = array("height"=>"440px");
                    $this->load->view("blocos/mapa",$mapa);
                ?>
            </div>
          
        </div>
    </div>

    
    <!-- end services -->

    <!-- footer -->
    <footer class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="content d-flex align-items-center justify-content-center flex-wrap">
                        <div class="brand">
                            <a href="https://www.salveadata.com.br/" class="" target="_blank">
                                <img src="<?=base_url("site/images/logo.png")?>" alt="">
                            </a>
                        </div>
                        <span class="w-100 text-center">Esta página foi feita através da plataforma <a href="https://www.salveadata.com.br/" class="" target="_blank"><b>Salve a Data<b></a></span>
                    </div>
                </div>


                <div class="col-6 col-md-3 col-sm-3 col-xs-3">
                    <div class="content d-none">
                        <a href="<?=base_url("Site/index")?>" class="botaoCriarSite">Criar site</a>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->