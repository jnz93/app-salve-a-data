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

                        <h4 class="card-title">Introdução</h4>
                        <p class="card-title-desc">Deixe uma mensagem de boas-vindas para seus convidados e faça uma breve descrição de seu evento.</p>

                        <div class="row">
                            <div class="col-sm-12">
                                <form action="<?=base_url("Cadastro/novaIntroducao")?>" class="row ajax">
                                    <div class="col-sm-12 campoForm">
                                        <label>Titulo</label>
                                        <input type="text" name="titulo" class="form-control" placeholder="Titulo" value="<?=$introducao["titulo"]?>">
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
                    </p>


                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>