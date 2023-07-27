<style>
    .dropzoneGal {
    text-align: center;
    padding: 50px;
    border-radius: 20px;
    min-height: 150px;
    border: 2px solid rgba(0,0,0,0.3);
    background: white;
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
                            <label class="switch">
                                <input type="checkbox" name="acompanhanteLista"
                                    <?=($evento["acompanhanteLista"] ? "checked" : "")?>>
                                <span class="slider round"></span>
                            </label>
                            <label style="
    top: 6px;
    position: relative;
">Ativar campo de acompanhantes</label>
                            <p class="card-title-desc">Acionando esse botão seus convidados poderão adicionar nomes de
                                seus acompanhantes no evento.</p>
                            <h4 class="card-title">Convidados cadastrados</h4>
                            <p class="card-title-desc">Aqui está a lista de convidados do seu evento.</p>
                            <form class="row box-filtro">
                                <div class="col-sm-7">
                                    <label>Buscar por nome</label>
                                    <input type="text" class="form-control" name="filtroNome"
                                        placeholder="Digite o nome do convidado">
                                </div>
                                <div class="col-sm-3">
                                    <label>Status</label>
                                    <select class="form-control" name="filtroStatus">
                                        <?php
                                            foreach($filtroStatus as $i=>$c){
                                                echo "<option value='$i'>$c</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-2">
                                    <button type="submit"
                                        class="btn btn-primary btn-sm waves-effect waves-light btSearh">
                                        <p class="bx bx-search-alt"></p>
                                    </button>
                                </div>
                            </form>

                            <div class="row box-filtro">
                                <div class="col-sm-2">
                                    <button type="button"
                                        class="btn btn-primary btn-sm waves-effect waves-light abreCadastroConvidado"><span
                                            class="mdi mdi-plus-thick"></span> Novo convidado</button>
                                </div>
                                <div class="col-sm-3">
                                    <button type="button"
                                        class="btn btn-primary btn-sm waves-effect waves-light abreCadastroMassa"><span
                                            class="mdi mdi-upload-outline"></span> Cadastrar em massa</button>
                                </div>
                            </div>
                            <div class="novoConvidado" style="display:none;">
                                <div class="row box-filtro">
                                    <div class="col-sm-12"><br>
                                        <h4 class="card-title">Cadastro de convidado</h4>
                                        <p class="card-title-desc">Cadastre aqui os convidados do Evento.</p>
                                    </div>

                                </div>
                                <div class="row box-filtro">
                                    <div class="col-sm-12">
                                        <form class="row ajax formConvidado" action="<?=base_url("Cadastro/novoConvidado")?>">
                                            <div class="col-sm-6 campoForm">
                                                <label>Nome</label>
                                                <input type="text" name="nome" class="form-control" placeholder="Nome">
                                            </div>
                                            <div class="col-sm-6 campoForm">
                                                <label>Sobrenome</label>
                                                <input type="text" name="sobrenome" class="form-control"
                                                    placeholder="Sobrenome">
                                            </div>
                                            <div class="col-sm-6 campoForm">
                                                <label>Telefone</label>
                                                <input type="text" name="telefone" class="form-control"
                                                    placeholder="Telefone">
                                            </div>
                                            <div class="col-sm-6 campoForm">
                                                <label>E-mail</label>
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="E-mail">
                                            </div>

                                            <div class="col-sm-12 text-left botoesAcoes">
                                                <button type="submit"
                                                    class="btn btn-primary waves-effect waves-light btPadrao">Salvar</button>
                                                <button type="button"
                                                    class="btn btn-outline-secondary waves-effect btCancelar cancelaCadastro">Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="uploadEmMassa row box-filtro" style="display:none;">
                                <h4 class="card-title">Enviar convidados em massa</h4>
                                <p class="card-title-desc">
                                    Faça o download do modelo da <a href="<?=base_url("convidados.csv")?>">planilha aqui</a>
                                </p>

                                <div>
                                    <form action="<?=base_url("Cadastro/enviaConvidadoMassa")?>" id="formzoneConvidados" class="dropzoneGal">
                                        <div class="fallback">
                                            <input name="file" type="file" multiple="multiple">
                                        </div>
                                        <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted mdi mdi-upload-network-outline"></i>
                                            </div>

                                            <h4>Arraste seu arquivo para enviar.</h4>
                                        </div>
                                    </form>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Send
                                        Files</button>
                                </div>
                            </div>
                            <?php
                                $statusConvidado = array(
                                    "pendente" => array(
                                        "badge"=>"bg-info",
                                        "titulo"=>"Pendente"
                                    ),
                                    "confirmado" => array(
                                        "badge"=>"bg-success",
                                        "titulo"=>"Confirmado"
                                    ),
                                    "recusado" => array(
                                        "badge"=>"bg-danger",
                                        "titulo"=>"Recusado"
                                    ),
                                );
                            ?>
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nome Completo</th>
                                                <th data-priority="1" class="text-center">Telefone</th>
                                                <th data-priority="3" class="text-center">E-mail</th>
                                                <?php
                                                    if($evento["acompanhanteLista"]){
                                                        ?>
                                                <th data-priority="3" class="text-center">Acompanhantes</th>
                                                <?php
                                                    }
                                                ?>
                                                <th data-priority="3" class="text-center">Status</th>
                                                <th data-priority="1" class="text-center">Editar</th>
                                                <th data-priority="3" class="text-center">Remover</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                               
                                                foreach($convidados as $convidado){
                                                    ?>
                                            <tr>
                                                <th class="text-center"><?=$convidado["nomeConvidado"]?></span></th>
                                                <td class="text-center"><?=$convidado["telefoneConvidado"]?></td>
                                                <td class="text-center"><?=$convidado["emailConvidado"]?></td>
                                                <?php
                                                    if($evento["acompanhanteLista"]){
                                                        ?>
                                                <td class="text-center"><?=$convidado["acompanhantes"]?></td>
                                                <?php
                                                    }
                                                ?>
                                                <td class="text-center"><span
                                                        class="badge rounded-pill <?=$statusConvidado[$convidado["status"]]["badge"]?>"><?=$statusConvidado[$convidado["status"]]["titulo"]?></span>
                                                </td>
                                                <td class="text-center"><a href="#" data-dados='<?=json_encode($convidado)?>' class="ajax editar editaConvidado"><span
                                                            class="mdi mdi-account-edit-outline"></span></a></td>
                                                <td class="text-center"><a href="<?=base_url("Cadastro/deletarConvidado/".$convidado["id_convidado"])?>" class="ajax deletar"><span
                                                            class="mdi mdi-trash-can-outline"></span></a></td>
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
<!-- end row -->
</div>