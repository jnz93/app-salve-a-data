<nav class="navbar navbar-expand-md navbar-light">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="icon ion-ios-menu"></i>
        </button>
        <?php $this->load->view("pages/nav")?>
    </div>
</nav>
<!-- end navbar -->

<!-- home intro -->
<?php $this->load->view("blocos/bannerTopoCasamento")?>
<!-- end home intro -->

<div id="portfolio" class="portfolio section-bottom-only">
    <div class="container">
        <div class="section-title textoPadrao">
            <h3 class="titleCentro"><?=$introducao["titulo"]?></h3>
        </div>


        <div class="row no-gutters filter-container">
            <div class="row">
                <div class="col-12 text-center textoPadrao">

                    <?=$introducao["texto"]?>
                </div>
            </div>
        </div>


    </div>
</div>


<div id="sobre" class="portfolio section-bottom-only">
    <div class="container">

        <div class="row no-gutters filter-container">
            <?php
            $i = 1;
                    foreach($protagonistas as $protagonista){
                        if($i%2 != 0){
                            ?>
            <div class="row">
                <div class="col-12 col-sm-3">
                    <img src="<?=($protagonista["foto"] != "" ? $protagonista["foto"] : base_url("assets/images/users/avatar-2.jpg"))?>"
                        class="imgSobre">
                </div>
                <div class="col-12 col-sm-9  textoSobre">
                    <h2 class="tituloSobre">Sobre <?=$protagonista["firstName"]?></h2>
                    <p><?=$protagonista["descricao"]?></p>

                </div>
            </div>
            <?php
                        }else{
                            ?>
            <div class="row">

                <div class="d-none d-sm-block col-12 col-sm-9  textoSobre">
                    <h2 class="tituloSobre">Sobre <?=$protagonista["firstName"]?></h2>
                    <p><?=$protagonista["descricao"]?></p>

                </div>
                <div class="col-12 col-sm-3">
                    <img src="<?=($protagonista["foto"] != "" ? $protagonista["foto"] : base_url("assets/images/users/avatar-2.jpg"))?>"
                        class="imgSobre">
                </div>

                <div class="d-block d-sm-none col-12 col-sm-9  textoSobre">
                    <h2 class="tituloSobre">Sobre <?=$protagonista["firstName"]?></h2>
                    <p><?=$protagonista["descricao"]?></p>

                </div>
            </div>
            <?php
                        }
                        ?>


            <?php
            $i++;
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
                            <?php
                                    foreach($mensagens as $i=>$mensagem){
                                        ?>
                            <div class="carousel-item <?=($i > 0 ? "" : "active")?>">
                                <p class="descricaoMensagem"><?=$mensagem["mensagem"]?></p>
                                <p class="descricaoMensagem">Ass: <?=$mensagem["nome"]?></p>
                            </div>
                            <?php
                                    }
                                ?>

                        </div>
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
            <h3 class="titleCentro">
                <?=($config["textoMidias"] != "" ? $config["textoMidias"] : "Nossa história de amor")?></h3>
        </div>


        <?php $this->load->view("blocos/album")?>

    </div>
</div>

<div id="presenca" class="process-work section imgSection bgBanner">
    <div class="container">
        <div class="row">

            <div class="col-12 col-sm-6 text-center boxPresenca">
                <div class="">
                    <h3 class="titleDireito">
                        <?=($config["titLista"] != "" ? $config["titLista"] : "Confira a lista de presentes e demonstre todo o seu carinho!")?>
                    </h3>

                    <ul style="
    padding-bottom: 28px;
">
                        <li><a href="<?=base_url("lista/".$evento["slug"])?>"
                                class="button iniCadastro btTransparente"><?=($config["textoBtLista"] != "" ? $config["textoBtLista"] : "Confira a lista")?></a>
                        </li>

                    </ul>

                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xs-6 boxTextoCentro">
                <div class="">
                    <h3 class="titleEsquerda">Confirmar presença</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php $this->load->view("blocos/formPresenca")?>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- about us -->
<div id="endereco" class="about">
    <div class="container">
        <div class="row">

            <div class="col-sm-12 boxTextoCentro">
                <?php 
                    $mapa = array("height"=>"600px");
                    $this->load->view("blocos/mapa",$mapa);
                ?>
            </div>

        </div>
    </div>
</div>

<!-- end services -->

<!-- footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-5 col-md-9 col-sm-9 col-xs-9">
                <div class="content">
                    <div class="brand"><img src="<?=base_url("site/images/logo.png")?>" alt=""></div>
                </div>
            </div>


            <div class="col-7 col-md-3 col-sm-3 col-xs-3">
                <div class="content">
                    <a href="<?=base_url("Site/index")?>" class="botaoCriarSite">Criar site</a>

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->