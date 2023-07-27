<style>
    .slim {
    width: 400px;
}
    </style>
<div class="page-content">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18"><?= $title ?></h4>

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
        <div class="col-xl-9">
        <a href="<?= base_url("cadastro") ?>" type="button"
                                class="btn btn-primary btn-sm waves-effect waves-light voltaPagina"><span
                                    class="mdi mdi-folder-account-outline"></span> Voltar para anfitriões</a>
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Complete o perfil</h4>
                    <p class="card-title-desc">É importante que os seus detalhes pessoais sejam preenchidos
                        corretamente.</p>

                    <div class="">
                        <div class="progress">
                            <div class="progress-bar <?=($perfilCompleto == 100 ? "bg-success" : "")?>"
                                role="progressbar" style="width: <?=$perfilCompleto?>%;"
                                aria-valuenow="<?=$perfilCompleto?>" aria-valuemin="0" aria-valuemax="100">
                                <?=$perfilCompleto?>%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="tab-content p-3 text-muted">
                        <div class="card-body">
                            
                            <h4 class="card-title">Foto de <?= $protagonista["firstName"] ?></h4>
                            <p class="card-title-desc">Cadastre informações sobre <?= $protagonista["firstName"] ?>.</p>
                            <div class="row albuns">
                                <div col-8>
                                <div class="slim" data-size="800,800"
                                    data-service="<?= base_url("Cadastro/imagemProtagonista/" . $protagonista["id_protagonista"]) ?>"
                                    data-download="true" data-instant-edit="true" data-ratio="16:16"
                                    data-copy-image-head="true" data-push="true"
                                    data-label="Arraste sua foto para enviar.">
                                    <?php
                                    if($protagonista["foto"] != ""){
                                        ?>
                                        <img src="<?=$protagonista["foto"]?>" alt="" />
                                        <?php
                                    }
                                    ?>
                                    
                                    <input type="file" name="slim[]" />
                                </div>

                                    <!-- <form
                                        action="<?= base_url("Cadastro/imagemProtagonista/" . $protagonista["id_protagonista"]) ?>"
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

                            </div>
                            <div class="informacoesComplementares row">
                                <h4 class="card-title">Informações complementares</h4>
                                <p class="card-title-desc">Complete as informações.</p>
                                <div class="col-12">
                                    <form
                                        action="<?= base_url("Cadastro/alteraDadosProtagonista/" . $protagonista["id_protagonista"]) ?>"
                                        class="ajax row">
                                        <div class="col-sm-6 campoForm">
                                            <label>Nome</label>
                                            <input type="text" class="form-control" name="nome"
                                                placeholder="Nome" value="<?= $protagonista["firstName"] ?>">
                                        </div>
                                        <div class="col-sm-6 campoForm">
                                            <label>Sobrenome</label>
                                            <input type="text" class="form-control" name="sobrenome"
                                                placeholder="Sobrenome" value="<?= $protagonista["lastName"] ?>">
                                        </div>
                                        <div class="col-sm-6 campoForm">
                                            <label>E-mail</label>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="E-mail" value="<?= $protagonista["email"] ?>">
                                        </div>
                                        <div class="col-sm-6 campoForm">
                                            <label>Telefone</label>
                                            <input type="text" class="form-control" name="telefone"
                                                placeholder="Telefone" value="<?= $protagonista["telefone"] ?>">
                                        </div>
                                        <div class="col-sm-12 campoForm">
                                            <label>Papel</label>
                                            <input type="text" class="form-control" name="papel"
                                                placeholder="Exemplo: Aniversáriante" value="<?= $protagonista["papel"] ?>">
                                        </div>
                                        <div class="col-sm-12 campoForm">
                                            <label>Descrição</label>
                                            <textarea type="text" class="form-control" name="descricao"
                                                placeholder="Descreva o protagnista" rows="10"><?= $protagonista["descricao"] ?></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit"
                                                class="btn btn-primary btn-sm waves-effect waves-light btSalvaIput">Salvar informações</button>
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
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <div class="profile-widgets py-3">

                        <div class="text-center">
                            <div class="">
                                <img src="<?=($protagonista["foto"] != "" ? $protagonista["foto"] : base_url("assets/images/users/avatar-2.jpg"))?>"
                                    alt="" class="avatar-lg mx-auto img-thumbnail rounded-circle">
                                <div class="online-circle"><i class="fas fa-circle text-success"></i>
                                </div>
                            </div>

                            <div class="mt-3 ">
                                <a href="#"
                                    class="text-dark fw-medium font-size-16"><?=$protagonista["firstName"]." ".$protagonista["lastName"]?></a>
                                <p class="text-body mt-1 mb-1">
                                    <?=($protagonista["papel"] != "" ? $protagonista["papel"] : "Anfitrião")?></p>
                            </div>

                            <div class="row mt-4 border border-start-0 border-end-0 p-3">
                                <div class="col-12">
                                    <h6 class="text-muted">
                                        Sobre
                                    </h6>
                                    <p class="mb-0">
                                        <?=($protagonista["descricao"] != "" ? $protagonista["descricao"] : "Sem descrição")?>
                                    </p>
                                </div>
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