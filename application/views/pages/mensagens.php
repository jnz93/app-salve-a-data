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



                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#aguardando" role="tab">
                                <span class="d-block d-sm-none"><i class="mdi mdi-clock-outline"></i></span>
                                <span class="d-none d-sm-block">Aguardando</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#aprovadas" role="tab">
                                <span class="d-block d-sm-none"><i class="mdi mdi-send-check-outline"></i></span>
                                <span class="d-none d-sm-block">Aprovadas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#removidas" role="tab">
                                <span class="d-block d-sm-none"><i class="mdi mdi-folder-remove-outline"></i></span>
                                <span class="d-none d-sm-block">Removidas</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#configuracao" role="tab">
                                <span class="d-block d-sm-none"><i class="mdi mdi-settings-outline"></i></span>
                                <span class="d-none d-sm-block">Configuração</span>
                            </a>
                        </li> -->

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="aguardando" role="tabpanel">
                            <?php
                                if(!isset(($mensagens["pendente"]))){
                                    ?>
                            <div class="row semMensagens">
                                <div class="col-12 text-center">
                                    <span class="iconSemMensagens">
                                        <p class="mdi mdi-clock-outline"></p>
                                    </span>
                                    <span class="tituloSemMensagens">Aguardando aprovação</span>
                                    <span class="descricaoSemMensagens">Não há mensagens pendentes.</span>
                                </div>
                            </div>

                            <?php
                                }else{
                                    ?>
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Mensagem</th>
                                                <th data-priority="1" class="text-center">Convidado</th>
                                                <th data-priority="3" class="text-center">E-mail</th>
                                                <th data-priority="3" class="text-center">Telefone</th>
                                                <th data-priority="3" class="text-center">Aceitar</th>
                                                <th data-priority="3" class="text-center">Recusar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($mensagens["pendente"] as $pendente){
                                                    ?>
                                            <tr>
                                                <th class="text-center"><?=$pendente["nome"]?></span></th>
                                                <th class="text-center"><?=$pendente["mensagem"]?></span></th>
                                                <th class="text-center"><?=$pendente["email"]?></span></th>
                                                <td class="text-center"><?=$pendente["telefone"]?></td>
                                                <td class="text-center"><a  href="<?=base_url("Usuario/alteraStatusMsg/".$pendente["id_mensagem"]."/aprovada")?>"
                                                            class="btn btn-success btn-sm waves-effect waves-light ajax">Aceitar</a>
                                                </td>
                                                <td class="text-center"><a href="<?=base_url("Usuario/alteraStatusMsg/".$pendente["id_mensagem"]."/reprovada")?>" type="button"
                                                            class="btn btn-danger btn-sm waves-effect waves-light ajax">Recusar</a>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <?php
                                }
                            ?>

                        </div>
                        <div class="tab-pane" id="aprovadas" role="tabpanel">
                        <?php
                                if(!isset(($mensagens["aprovada"]))){
                                    ?>
                            <div class="row semMensagens">
                                <div class="col-12 text-center">
                                    <span class="iconSemMensagens">
                                        <p class="mdi mdi-clock-outline"></p>
                                    </span>
                                    <span class="tituloSemMensagens">Aguardando aprovação</span>
                                    <span class="descricaoSemMensagens">Não há mensagens aprovadas.</span>
                                </div>
                            </div>
                            <?php
                                }else{
                                    ?>
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Mensagem</th>
                                                <th data-priority="1" class="text-center">Convidado</th>
                                                <th data-priority="3" class="text-center">E-mail</th>
                                                <th data-priority="3" class="text-center">Telefone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($mensagens["aprovada"] as $aprovada){
                                                    ?>
                                            <tr>
                                                <th class="text-center"><?=$aprovada["mensagem"]?></span></th>
                                                <th class="text-center"><?=$aprovada["nome"]?></span></th>
                                                <th class="text-center"><?=$aprovada["email"]?></span></th>
                                                <td class="text-center"><?=$aprovada["telefone"]?></td>
                                                <td class="text-center"><a href="<?=base_url("Usuario/alteraStatusMsg/".$aprovada["id_mensagem"]."/reprovada")?>" type="button"
                                                            class="btn btn-danger btn-sm waves-effect waves-light ajax">Recusar</a>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="tab-pane" id="removidas" role="tabpanel">
                        <?php
                                if(!isset(($mensagens["reprovada"]))){
                                    ?>
                            <div class="row semMensagens">
                                <div class="col-12 text-center">
                                    <span class="iconSemMensagens">
                                        <p class="mdi mdi-clock-outline"></p>
                                    </span>
                                    <span class="tituloSemMensagens">Aguardando aprovação</span>
                                    <span class="descricaoSemMensagens">Não há mensagens removidas.</span>
                                </div>
                            </div>
                            <?php
                                }else{
                                    ?>
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Mensagem</th>
                                                <th data-priority="1" class="text-center">Convidado</th>
                                                <th data-priority="3" class="text-center">E-mail</th>
                                                <th data-priority="3" class="text-center">Telefone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($mensagens["reprovada"] as $reprovada){
                                                    ?>
                                            <tr>
                                                <th class="text-center"><?=$reprovada["mensagem"]?></span></th>
                                                <th class="text-center"><?=$reprovada["nome"]?></span></th>
                                                <th class="text-center"><?=$reprovada["email"]?></span></th>
                                                <td class="text-center"><?=$reprovada["telefone"]?></td>
                                                <td class="text-center"><a  href="<?=base_url("Usuario/alteraStatusMsg/".$reprovada["id_mensagem"]."/aprovada")?>"
                                                            class="btn btn-success btn-sm waves-effect waves-light ajax">Mover para aprovadas</a>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <!-- <div class="tab-pane" id="configuracao" role="tabpanel">
                            <div class="row configMensagens">
                                <div class="col-10">
                                    <span class="titConfigMensagens">Moderação</span>
                                    <span class="descricaoConfigMensagens">Aprovar mensagens antes de exibí-las em seu
                                        Save the Date?</span>
                                </div>
                                <div class="col-2 checkCampo">
                                    <input type="checkbox" id="switch1" switch="none" checked />
                                    <label class="form-label" for="switch1" data-on-label="On"
                                        data-off-label="Off"></label>
                                </div>
                            </div>
                            <hr>
                            <div class="row configMensagens">
                                <div class="col-10">
                                    <span class="titConfigMensagens">Respostas</span>
                                    <span class="descricaoConfigMensagens">Deseja que suas respostas sejam
                                        publicadas?</span>
                                </div>
                                <div class="col-2 checkCampo">
                                    <input type="checkbox" id="switch1" switch="none" checked />
                                    <label class="form-label" for="switch1" data-on-label="On"
                                        data-off-label="Off"></label>
                                </div>
                            </div>
                            <hr>
                            <div class="row configMensagens">
                                <div class="col-10">
                                    <span class="titConfigMensagens">Nome do remetende</span>
                                    <span class="descricaoConfigMensagens">Deseja enviar respostas em nome do
                                        casal?</span>
                                </div>
                                <div class="col-2 checkCampo">
                                    <input type="checkbox" id="switch1" switch="none" checked />
                                    <label class="form-label" for="switch1" data-on-label="On"
                                        data-off-label="Off"></label>
                                </div>
                            </div>
                        </div> -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>