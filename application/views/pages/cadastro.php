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
                            <a class="nav-link active" data-bs-toggle="tab" href="#protagonistas" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Anfitriões</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#enderecos" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">Endereço do evento</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#dataevento" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block">Data do evento</span>
                            </a>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="protagonistas" role="tabpanel">
                            <p class="mb-0">
                            <div class="row">
                                <div class="col-sm-4">
                                    <button type="button"
                                        class="btn btn-primary btn-sm waves-effect waves-light abreCadastroProtagonista"><span
                                            class="mdi mdi-plus-thick"></span> Novo anfitrião</button>
                                </div>
                            </div>
                            <div class="novoProtagonista">
                                <div class="row">
                                    <div class="col-sm-12"><br>
                                        <h4 class="card-title">Anfitrião</h4>
                                        <p class="card-title-desc">Preencha os dados dos anfitrões que deseja que apareça no site.</p>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form action="<?=base_url("Cadastro/novoProtagonista")?>" class="row ajax">
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

                            <div class="card-body">

                                <h4 class="card-title">Anfitriões cadastrados</h4>
                                <p class="card-title-desc">Preencha os dados dos anfitrões que deseja que apareça no site.</p>

                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Foto</th>
                                                    <th class="text-center">Nome Completo</th>
                                                    <th data-priority="1" class="text-center">Telefone</th>
                                                    <th data-priority="3" class="text-center">E-mail</th>
                                                    <th data-priority="1" class="text-center">Editar</th>
                                                    <th data-priority="3" class="text-center">Remover</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                    foreach($protagonistas as $protagonista){
                                                        ?>
                                                <tr class="protagonistas">
                                                    <td class="text-center"><img
                                                            class="rounded-circle header-profile-user"
                                                            src="<?=($protagonista["foto"] != "" ? $protagonista["foto"] : base_url("assets/images/users/avatar-2.jpg"))?>">
                                                        </th>
                                                    <td class="text-center"><?=$protagonista["firstName"]?>
                                                        <?=$protagonista["lastName"]?></span></th>
                                                    <td class="text-center"><?=$protagonista["telefone"]?></td>
                                                    <td class="text-center"><?=$protagonista["email"]?></td>
                                                    <td class="text-center"><a
                                                            href="<?=base_url("anfitriao/".$protagonista["id_protagonista"])?>"
                                                            class="editar"><span
                                                                class="mdi mdi-account-edit-outline"></span></a></td>
                                                    <td class="text-center"><a
                                                            href="<?=base_url("Cadastro/deletarProtagonista/".$protagonista["id_protagonista"])?>"
                                                            class="ajax deletar"><span
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
                        <div class="tab-pane" id="enderecos" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-12"><br>
                                    <h4 class="card-title">Endereço</h4>
                                    <p class="card-title-desc">Adicione aqui o endereço completo do seu evento</p>
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
                                                <input type="text" name="cep" class="form-control getCep"
                                                    placeholder="CEP" value="<?=$endereco["cep"]?>">
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
                        <div class="tab-pane" id="dataevento" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-12"><br>
                                    <h4 class="card-title">Data do evento</h4>
                                    <p class="card-title-desc">Adicione ou altere a data do seu evento.</p>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form class="row ajax" action="<?=base_url("Cadastro/dataEvento")?>">
                                        <div class="col-sm-6 campoForm">
                                            <label>Data de Início</label>
                                            <input type="datetime-local" name="dataInicio" class="form-control"
                                                placeholder="<?=date("d M Y")?>" value="<?=$evento["dataInicio"]?>">
                                        </div>
                                        <div class="col-sm-6 campoForm">
                                            <label>Data de Término</label>
                                            <input type="datetime-local" name="dataTermino" class="form-control"
                                                placeholder="<?=date("d M Y")?>" value="<?=$evento["dataTermino"]?>">
                                        </div>
                                        <div class="col-sm-12 text-left botoesAcoes">
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light btPadrao">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>