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
                    <div class="row">
                        <div class="col-sm-12"><br>
                            <h4 class="card-title">Endereço</h4>
                            <p class="card-title-desc">Adicione aqui o endereço completo do seu Evento</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <form class="row ajax" action="<?=base_url("Cadastro/enderecoEvento")?>">
                            <div class="row">
                                            <div class="col-sm-6 campoForm">
                                                <label>Nome do local</label>
                                                <input type="text" name="nomeLocal" class="form-control"
                                                    placeholder="Digite o nome do local" value="<?=$endereco["nomeLocal"]?>">
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-sm-6 campoForm">
                                        <label>Cep</label>
                                        <input type="text" name="cep" class="form-control getCep" placeholder="CEP"
                                            value="<?=$endereco["cep"]?>">
                                    </div>
                                </div>

                                <div class="col-sm-6 campoForm">
                                    <label>Rua/ Avenida</label>
                                    <input type="text" name="logradouro" class="form-control logradouro getMaps"
                                        placeholder="Rua/ Avenida" value="<?=$endereco["logradouro"]?>">
                                </div>
                                <div class="col-sm-6 campoForm">
                                    <label>Número</label>
                                    <input type="text" name="numero" class="form-control numero getMaps"
                                        placeholder="Número" value="<?=$endereco["numero"]?>">
                                </div>
                                <div class="col-sm-6 campoForm">
                                    <label>Bairro</label>
                                    <input type="text" name="bairro" class="form-control bairro getMaps"
                                        placeholder="Bairro" value="<?=$endereco["bairro"]?>">
                                </div>
                                <div class="col-sm-6 campoForm">
                                    <label>Cidade</label>
                                    <input type="text" name="cidade" class="form-control cidade getMaps"
                                        placeholder="Cidade" value="<?=$endereco["cidade"]?>">
                                </div>
                                <div class="col-sm-6 campoForm">
                                    <label>Estado</label>
                                    <input type="text" name="estado" class="form-control estado getMaps"
                                        placeholder="Estado" value="<?=$endereco["estado"]?>">
                                </div>
                                <div class="col-sm-6 campoForm">
                                    <label>País</label>
                                    <input type="text" name="pais" class="form-control" placeholder="País"
                                        value="<?=$endereco["pais"]?>">
                                </div>
                                <div class="col-sm-12 text-left botoesAcoes">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light btPadrao">Salvar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4">
                            <iframe width="100%" height="650" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=<?=$endereco["logradouro"]?>, <?=$endereco["numero"]?>,<?=$endereco["bairro"]?>,<?=$endereco["estado"]?>?>&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>