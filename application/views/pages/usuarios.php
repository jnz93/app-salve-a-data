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
                    <div class="row">
                        <div class="col-sm-4">
                            <button type="button"
                                class="btn btn-primary btn-sm waves-effect waves-light abreCadastroProtagonista"><span
                                    class="mdi mdi-plus-thick"></span> Novo Usuário</button>
                        </div>
                    </div>
                    <div class="novoProtagonista">
                        <div class="row">
                            <div class="col-sm-12"><br>
                                <h4 class="card-title">Novo Usuário</h4>
                                <p class="card-title-desc">O seu evento tem mais organizadores? Adicione eles aqui para obter acesso ao painel de controle.</p>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="<?=base_url("Cadastro/novoUsuarioSistema")?>" class="row ajax formUsuario">
                                    <div class="col-sm-6 campoForm">
                                        <label>Nome</label>
                                        <input type="text" name="nome" class="form-control" placeholder="Nome">
                                    </div>
                                    <div class="col-sm-6 campoForm">
                                        <label>Telefone</label>
                                        <input type="text" name="telefone" class="form-control" placeholder="Telefone">
                                    </div>
                                    <div class="col-sm-6 campoForm">
                                        <label>E-mail</label>
                                        <input type="email" name="email" class="form-control" placeholder="E-mail">
                                    </div>
                                    <div class="col-sm-6 campoForm">
                                        <label>Senha</label>
                                        <input type="text" name="senha" class="form-control"
                                            placeholder="Senha">
                                    </div>
                                    <div class="col-sm-12 text-left botoesAcoes">
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light btPadrao">Salvar</button>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <h4 class="card-title">Usuários cadastrados</h4>
                        <p class="card-title-desc">O seu evento tem mais organizadores? Adicione eles aqui para obter acesso ao painel de controle..</p>

                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nome</th>
                                            <th data-priority="1" class="text-center">Telefone</th>
                                            <th data-priority="3" class="text-center">E-mail</th>
                                            <th data-priority="1" class="text-center">Editar</th>
                                            <th data-priority="3" class="text-center">Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                                    foreach($usuarios as $usuario){
                                                        ?>
                                        <tr>
                                            <th class="text-center"><?=$usuario["nome"]?></span></th>
                                            <td class="text-center"><?=$usuario["telefone"]?></td>
                                            <td class="text-center"><?=$usuario["email"]?></td>
                                            <td class="text-center"><a href="#" data-dados='<?=json_encode($usuario)?>' class="ajax editar editarUsuario"><span
                                                        class="mdi mdi-account-edit-outline"></span></a></td>
                                            <td class="text-center"><a
                                                    href="<?=base_url("Cadastro/deletarUsuario/".$usuario["user"])?>"
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
            </div>
        </div>
    </div>
    <!-- end row -->
</div>