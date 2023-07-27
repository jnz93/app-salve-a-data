<style>


.home-intro {
    padding: 63px 0;
    height: 269px;
    background-repeat: no-repeat;
}

@media (max-width: 767px) {

    .boxEdicao {
        width: 100%;
    }
}
</style>
<link href="<?= base_url('assets/slim.min.css') ?>" rel="stylesheet">
<div class="boxEdicao">
    <div class="row">
        <div class="col-6 text-center">
            <a href="<?=base_url("escolhaseulayout")?>" type="button"
                class="btn btn-primary btn-sm waves-effect waves-light voltaPagina"><span
                    class="mdi mdi-folder-account-outline"></span> Voltar para painel</a>
        </div>

        <div class="col-6 text-center">
            <a href="<?=base_url("site/".$evento["slug"])?>" target="_BLANK" type="button"
                class="btn btn-primary btn-sm waves-effect waves-light"><span class="mdi mdi-launch"></span> Visualizar
                site</a>
        </div>
        <div class="col-12">
            <h1 class="titEditLayout">Configurações do layout</h1>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#configGerais" aria-expanded="true" aria-controls="configGerais">
                                Configurações Gerais <i class="mdi mdi-chevron-right"></i>
                            </button>
                        </h2>
                    </div>

                    <div id="configGerais" class="collapse" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <form class="ajax row" action="<?=base_url("Templates/salvaConfigGerais")?>">
                                <div class="col-sm-12 campoInput">
                                    <label>Título principal</label>
                                    <input type="text" class="form-control" placeholder="Titulo do site" name="headLine"
                                        value="<?=$config["headLine"]?>">
                                </div>
                                <div class="col-sm-12 campoInput">
                                    <label>Texto botão Confirmar presença</label>
                                    <input type="text" class="form-control" placeholder="Confirmar presença"
                                        name="textoBtHeadLine" value="<?=$config["textoBtHeadLine"]?>">
                                </div>
                                <div class="col-sm-12 campoInput">
                                    <label>Título contagem regressiva</label>
                                    <input type="text" class="form-control" placeholder="Ex.: Contagem regressiva"
                                        name="textoContadoTempo" value="<?=$config["textoContadoTempo"]?>">
                                </div>
                                <div class="col-sm-6 campoInput">
                                    <label class="labelCor">Cor principal</label>
                                    <input type="color" id="color" name="corPrincipal"
                                        value="<?=$config["corPrincipal"]?>" style="padding: 4px!important;">
                                </div>
                                <div class="col-sm-6 campoInput">
                                    <label class="labelCor">Cor texto menu</label>
                                    <input type="color" id="color" name="corTextoMenu"
                                        value="<?=$config["corTextoMenu"]?>" style="padding: 4px!important;">
                                </div>
                                <div class="col-sm-6 campoInput">
                                    <label class="labelCor">Cor títulos</label>
                                    <input type="color" id="color" name="corTitulos" value="<?=$config["corTitulos"]?>"
                                        style="padding: 4px!important;">
                                </div>

                                <div class="col-sm-6 campoInput">
                                    <label class="labelCor">Cor complementar</label>
                                    <input type="color" id="color" name="corComplementar"
                                        value="<?=$config["corComplementar"]?>" style="padding: 4px!important;">
                                </div>
                                <div class="col-sm-6 campoInput">
                                    <label class="labelCor">Cor títulos banner</label>
                                    <input type="color" id="color" name="corTitulosBanner"
                                        value="<?=$config["corTitulosBanner"]?>" style="padding: 4px!important;">
                                </div>
                                <div class="col-sm-6 campoInput">
                                    <label class="labelCor">Cor textos banner</label>
                                    <input type="color" id="color" name="corTextosBanner"
                                        value="<?=$config["corTextosBanner"]?>" style="padding: 4px!important;">
                                </div>
                                <div class="col-sm-6 campoInput">
                                    <label class="labelCor">Cor contador de tempo</label>
                                    <input type="color" id="color" name="corContadorTempo"
                                        value="<?=$config["corContadorTempo"]?>" style="padding: 4px!important;">
                                </div>
                                <div class="col-sm-6 campoInput">
                                    <label class="labelCor">Cor fundo mensagens</label>
                                    <input type="color" id="color" name="corFundoMsg"
                                        value="<?=$config["corFundoMsg"]?>" style="padding: 4px!important;">
                                </div>
                                <div class="col-sm-12 text-left botoesAcoes">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light btPadrao">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#seo" aria-expanded="true" aria-controls="seo">
                                SEO <i class="mdi mdi-chevron-right"></i>
                            </button>
                        </h2>
                    </div>

                    <div id="seo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <form class="ajax row" action="<?=base_url("Templates/salvaSeo")?>">
                                <div class="col-sm-12 campoInput">
                                    <label>URL Personalizada</label>
                                    <input type="text" class="form-control" placeholder="/<?=$evento["slug"]?>"
                                        name="slug" value="<?=$evento["slug"]?>">
                                    <div class="retValidaUrl"></div>
                                </div>
                                <div class="col-sm-12 text-left botoesAcoes">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light btPadrao">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#clock" aria-expanded="true" aria-controls="clock">
                                Contador de Tempo <i class="mdi mdi-chevron-right"></i>
                            </button>
                        </h2>
                    </div>

                    <div id="clock" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <form class="ajax row" action="<?=base_url("Templates/contagemRegressiva")?>">
                                <div class="col-sm-12 campoInput">
                                    <label>Ativar contador de tempo</label>
                                    <label class="switch">
                                        <input type="checkbox" name="contagemRegressiva"
                                            <?=($evento["contagemRegressiva"] ? "checked" : "")?>>
                                        <span class="slider round"></span>
                                    </label>

                                </div>
                                <div class="col-sm-12 text-left botoesAcoes">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light btPadrao">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#musica" aria-expanded="true" aria-controls="musica">
                                Adicionar música <i class="mdi mdi-chevron-right"></i>
                            </button>
                        </h2>
                    </div>

                    <div id="musica" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <form class="ajax row" action="<?=base_url("Templates/salvaMusica")?>">
                                <?php
                                if($evento["id_plano"]){
                                    ?>
                                <div class="col-sm-12 campoInput">
                                    <label>Link do video YouTube de sua Música</label>

                                    <input type="text" class="form-control" placeholder="adicione a url do video"
                                        name="video" value="<?=$evento["video"]?>">

                                </div>
                                <div class="col-sm-12 text-left botoesAcoes">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light btPadrao">Salvar</button>
                                </div>

                                <?php
                                }else{
                                    ?>
                                <a href="<?=base_url("assinaturas")?>"
                                    class="btn btn-primary waves-effect waves-light btPadrao">Para adicionar música
                                    selecione um plano</a>
                                <?php
                                }
                            ?>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#banners" aria-expanded="false"
                                aria-controls="banners">
                                Banners <i class="mdi mdi-chevron-right"></i>
                            </button>
                        </h2>
                    </div>
                    <div id="banners" class="collapse" aria-labelledby="headingTwo" data-parent="#banners">
                        <div class="card-body">
                            <div class="col-sm-12 campoInput">
                                <label>Banner principal</label>



                                <div class="slim" data-size="1920,800"
                                    data-service="<?= base_url("Templates/trocaBanner/principal/" . $evento["id_evento"]) ?>"
                                    data-download="true" data-instant-edit="true" data-ratio="16:7"
                                    data-copy-image-head="true" data-push="true"
                                    data-label="Arraste sua foto para enviar.">
                                    <img src="<?= $config["bgTopo"] ?>" alt="" />
                                    <input type="file" name="slim[]" />
                                </div>
                                <label>Banner principal (Celular)</label>
                                <div class="slim" data-size="400,800"
                                    data-service="<?= base_url("Templates/trocaBanner/principalMobile/" . $evento["id_evento"]) ?>"
                                    data-download="true" data-instant-edit="true" data-ratio="7:16"
                                    data-copy-image-head="true" data-push="true"
                                    data-label="Arraste sua foto para enviar.">
                                    <img src="<?= $config["bgTopoMobile"] ?>" alt="" />
                                    <input type="file" name="slim[]" />
                                </div>


                                <!-- <form
                                    action="<?= base_url("Templates/trocaBanner/principal/" . $evento["id_evento"]) ?>"
                                    id="formzone" class="dropzone" enctype='multipart/form-data'>
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted mdi mdi-file-image-outline"></i>
                                        </div>

                                        <h4>Arraste sua foto para enviar.</h4>
                                    </div>
                                </form> -->
                            </div>
                            <!-- <div class="col-sm-12 campoInput">
                                <label>Banner mensagens</label>
                                <div class="slim" data-size="1920,800"
                                    data-service="<?= base_url("Templates/trocaBanner/mensagens/" . $evento["id_evento"]) ?>"
                                    data-download="true" data-instant-edit="true" data-ratio="16:7"
                                    data-copy-image-head="true" data-push="true"
                                    data-label="Arraste sua foto para enviar.">
                                    <img src="<?= $config["bgMsg"] ?>" alt="" />
                                    <input type="file" name="slim[]" />
                                </div>
                                
                            </div> -->
                            <!-- <div class="col-sm-12 campoInput">
                                <label>Banner lista de presentes</label>
                                <div class="slim" data-size="1920,800"
                                    data-service="<?= base_url("Templates/trocaBanner/presentes/" . $evento["id_evento"]) ?>"
                                    data-download="true" data-instant-edit="true" data-ratio="16:7"
                                    data-copy-image-head="true" data-push="true"
                                    data-label="Arraste sua foto para enviar.">
                                    <img src="<?= $config["bgLista"] ?>" alt="" />
                                    <input type="file" name="slim[]" />
                                </div>
                                <form
                                    action="<?= base_url("Templates/trocaBanner/presentes/" . $evento["id_evento"]) ?>"
                                    id="formzone" class="dropzone" enctype='multipart/form-data'>
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted mdi mdi-file-image-outline"></i>
                                        </div>

                                        <h4>Arraste sua foto para enviar.</h4>
                                    </div>
                                </form>
                            </div> -->
                            <!-- <div class="col-sm-12 campoInput">
                                <label>Banner rodapé</label>
                                <div class="slim" data-size="1920,700"
                                    data-service="<?= base_url("Templates/trocaBanner/rodape/" . $evento["id_evento"]) ?>"
                                    data-download="true" data-instant-edit="true" data-ratio="16:6"
                                    data-copy-image-head="true" data-push="true"
                                    data-label="Arraste sua foto para enviar.">
                                    <img src="<?= $config["bgFim"] ?>" alt="" />
                                    <input type="file" name="slim[]" />
                                </div>
                                
                            </div> -->
                            <form class="ajax" action="<?=base_url("Templates/salvaBanners")?>">
                                <div class="col-sm-12 text-left botoesAcoes">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light btPadrao">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                Títulos <i class="mdi mdi-chevron-right"></i>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <form class="ajax row" action="<?=base_url("Templates/salvaTitulos")?>">
                                <div class="col-sm-12 campoInput">
                                    <label>Título mensagens</label>
                                    <input type="text" class="form-control" placeholder="Titulo mensagens" name="titMsg"
                                        value="<?=$config["titMsg"]?>">
                                </div>
                                <div class="col-sm-12 campoInput">
                                    <label>Texto botão mensagens</label>
                                    <input type="text" class="form-control" placeholder="Deixar mensagem"
                                        name="textoBtMsg" value="<?=$config["textoBtMsg"]?>">
                                </div>
                                <div class="col-sm-12 campoInput">
                                    <label>Título álbum de mídias</label>
                                    <input type="text" class="form-control" placeholder="Titulo Álbum mídias"
                                        name="textoMidias" value="<?=$config["textoMidias"]?>">
                                </div>

                                <div class="col-sm-12 campoInput">
                                    <label>Título lista de presentes</label>
                                    <input type="text" class="form-control" placeholder="Titulo lista presentes"
                                        name="titLista" value="<?=$config["titLista"]?>">
                                </div>
                                <div class="col-sm-12 campoInput">
                                    <label>Texto botão lista de presentes</label>
                                    <input type="text" class="form-control" placeholder="Ex.: Ver lista de presentes"
                                        name="textoBtLista" value="<?=$config["textoBtLista"]?>">
                                </div>
                                <div class="col-sm-12 text-left botoesAcoes">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light btPadrao">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#intro" aria-expanded="false" aria-controls="intro">
                                Introdução <i class="mdi mdi-chevron-right"></i>
                            </button>
                        </h2>
                    </div>
                    <div id="intro" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <form action="<?=base_url("Cadastro/novaIntroducao")?>" class="row ajax">
                                <div class="col-sm-12 campoForm">
                                    <label>Titulo</label>
                                    <input type="text" name="titulo" class="form-control" placeholder="Titulo"
                                        value="<?=$introducao["titulo"]?>">
                                </div>
                                <div class="col-sm-12 campoForm">
                                    <label>Sua introdução</label>
                                    <textarea id="elm1" name="introducao"><?=$introducao["texto"]?></textarea>
                                </div>
                                <div class="col-sm-12 text-left botoesAcoes">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light btPadrao">Salvar</button>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <a href="<?=base_url("paginaspersonalizadas")?>" target="_BLANK" class="btn btn-link btn-block text-left collapsed" >
                                Páginas personalizadas <i class="mdi mdi-chevron-right"></i>
                            </a>
                        </h2>
                    </div>
                    
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <a href="<?=base_url("albunsmidia")?>" target="_BLANK" class="btn btn-link btn-block text-left collapsed" >
                                Álbuns de mídia <i class="mdi mdi-chevron-right"></i>
                            </a>
                        </h2>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
