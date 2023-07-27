<style>
    .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred, .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-focused {
    height: 400px;
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
                                class="btn btn-primary btn-sm waves-effect waves-light abreNovaPagina"><span
                                    class="mdi mdi-plus-thick"></span> Nova Página</button>
                        </div>
                    </div>
                    <div class="novaPagina">
                        <div class="row">
                            <div class="col-sm-12"><br>
                                <h4 class="card-title">Página personalizada</h4>
                                <p class="card-title-desc">Cadastre aqui sua página personalizada.</p>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="<?=base_url("Cadastro/novaPagina")?>" class="row ajax formPagina">
                                    <div class="col-sm-12 campoForm">
                                        <label>Titulo</label>
                                        <input type="text" name="titulo" class="form-control" placeholder="Titulo">
                                    </div>
                                    <div class="col-sm-12 campoForm">
                                        <label>Sua introdução</label>
                                        <textarea id="editor" name="html"></textarea>
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

                        <h4 class="card-title">Suas páginas cadastradas</h4>
                        <p class="card-title-desc">Lista de suas páginas personalizadas.</p>
                        <div class="table-rep-plugin">
                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th data-priority="1" class="text-center">Titulo</th>
                                            <th data-priority="3" class="text-center">URL</th>
                                            <th data-priority="1" class="text-center">Editar</th>
                                            <th data-priority="3" class="text-center">Remover</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                                    foreach($paginas as $pagina){
                                                        ?>
                                        <tr>
                                            <th class="text-center"><?=$pagina["titulo"]?></span></th>
                                            <td class="text-center"><?=$pagina["handle"]?></td>
                                            <td class="text-center"><a href="#" data-dados='<?=json_encode($pagina)?>' class="ajax editar editarPagina"><span
                                                        class="mdi mdi-account-edit-outline"></span></a></td>
                                            <td class="text-center"><a
                                                    href="<?=base_url("Cadastro/deletarPagina/".$pagina["id_pagina"])?>"
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