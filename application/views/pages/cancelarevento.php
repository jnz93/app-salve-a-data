<div class="page-content">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18"><?=$title?></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="<?=base_url("site/".$evento["slug"])?>" target="_BLANK" type="button" class="btn btn-primary btn-sm waves-effect waves-light visualizarSite"><span class="mdi mdi-launch"></span> Visualizar site</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">


                    <p class="mb-0">


                    <div class="card-body">
                        <?php
                            if($evento["status"] == "cancelado"){
                                ?>
                        <div class="row semMensagens">
                            <div class="col-12 text-center">
                                <span class="iconSemMensagens">
                                    <p class="mdi mdi-cancel"></p>
                                </span>
                                <span class="tituloSemMensagens">Evento Cancelado</span>
                                <span class="descricaoSemMensagens"><?=$cancelamento["motivo"]?> <p>Cancelado em: <?=convertData($cancelamento["inclusao"])?></p></span>
                            </div>
                        </div>
                        <?php
                            }else{
                                ?>
                        <h4 class="card-title">Cancelar evento</h4>
                        <p class="card-title-desc">Confirme seu e-mail e senha para cancelar seu evento.</p>

                        <div class="row">
                            <div class="col-sm-12">
                                <form action="<?=base_url("Cadastro/novoCancelamento")?>" class="row ajax">
                                    <div class="col-sm-6 campoForm">
                                        <label>E-mail</label>
                                        <input type="text" name="email" class="form-control" placeholder="E-mail">
                                    </div>
                                    <div class="col-sm-6 campoForm">
                                        <label>Senha</label>
                                        <input type="password" name="senha" class="form-control" placeholder="Senha">
                                    </div>
                                    <div class="col-sm-12 campoForm">
                                        <label>Motivo do cancelamento</label>
                                        <textarea id="elm1" name="motivo"></textarea>
                                    </div>
                                    <div class="col-sm-12 text-left botoesAcoes">
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light btPadrao">Salvar</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                            }
                        ?>


                    </div>
                    </p>


                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>