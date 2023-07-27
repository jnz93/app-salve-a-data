<style>
.disponivel {
    color: #52b626;
    font-weight: bold;
}

.indisponivel {
    color: #bd3b20;
    font-weight: bold;
}
</style>
<div class="page-content">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18"><?=$title?></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="<?=base_url("site/".$evento["slug"])?>"
                                target="_BLANK" type="button"
                                class="btn btn-primary btn-sm waves-effect waves-light visualizarSite"><span
                                    class="mdi mdi-launch"></span> Visualizar site</a></li>
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
                    <div class="tab-content p-3 text-muted">
                        <div class="card-body">

                            <h4 class="card-title">Domínio personalizado</h4>
                            <p class="card-title-desc">Aqui você pode escolher qual será a URL do seu evento de maneira
                                personalizada, sem a nossa marca. Por ex: www.joaoemaria.com.br,
                                www.formaturadafabi.com.br www.chadebebedoleo.com.br.. Consulte abaixo a
                                disponibilidade:</p>
                                <?php
                                    if(count($dominios) < 1){
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target="#novoDominio"><span
                                                        class="mdi mdi-plus-thick"></span> Novo domínio</button>
                                            </div>
                                        </div>
                                    
                                        <?php
                                    }
                                ?>
                            <div class="row box-filtro">
                                <form class="ajax row" action="<?=base_url("Dominios/consultaDominio")?>">
                                    <div class="col-sm-4">
                                        <label>Buscar por domínio</label>
                                        <input type="text" class="form-control" name="dominio"
                                            placeholder="meudominio.com">
                                        <span class="retornoDominio"></span>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit"
                                            class="btn btn-primary btn-sm waves-effect waves-light btSearh">
                                            <p class="bx bx-search-alt"></p>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Domínio</th>
                                                <th data-priority="1" class="text-center">Criado em</th>
                                                <th data-priority="3" class="text-center">HTTPS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($dominios as $dominio){
                                                    ?>
                                                    <tr class="">
                                                        <th class="text-center"><?=$dominio["dominio"]?></th>
                                                        <td class="text-center"><?=convertData($dominio["inclusao"])?></td>
                                                        <td class="text-center"><span
                                                                class="badge rounded-pill bg-success">Ativo</span></td>
                                                    </tr>
                                                
                                                    <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                        </p>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="novoDominio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar um novo domínio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="ajax" action="<?=base_url("Dominios/addDominio")?>">
                <div class="modal-body">
                    <div class="alert alert-danger alert-dismissible erroMessage" style="display:none;" role="alert">
                    </div>

                    <section class="form-step form-step-0" style="display:block;">

                        <div>
                            <label for="">Insira o <b>domínio</b> ou <b>subdomínio</b> que você deseja conectar.</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">https://</span>
                                </div>
                                <input type="text" class="form-control" name="dominio" placeholder="meudominio.com.br">
                            </div>
                        </div>

                        <p>
                            <small><span class="font-weight-bold">Importante:</span> O seu novo domínio será ativado em até 48 horas úteis</small>
                        </p>


                    </section>
                </div>
                <div class="modal-footer">
                    <button data-step="0" class="btn btn-primary btn-incluir text-white">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end row -->
</div>