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
                            <h4 class="card-title">Personalizar seu site</h4>
                            <p class="card-title-desc">Primeiro escolha o modelo de layout que deseja e depois edite e personalize ele para deixar a cara do seu evento. <br><b>O tipo de evento nos modelos dos layout's é meramente ilustrativo.</b>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <a href="<?=base_url("tema/".$evento["slug"])?>" target="_BLANK" type="button" class="btn btn-primary btn-sm waves-effect waves-light"><span
                                    class="mdi mdi-brush"></span> Editar seu Layout</a>
                        </div>
                        <div class="col-sm-2">
                            <a href="<?=base_url("site/".$evento["slug"])?>" target="_BLANK" type="button" class="btn btn-primary btn-sm waves-effect waves-light"><span
                                    class="mdi mdi-launch"></span> Visualizar site</a>
                        </div>
                    </div>
                    <div class="row boxTemplates">
                        <div class="col-xl-3 col-md-6">
                            <div class="card plan-box">
                                <div class="card-body p-4 boxLayout"
                                    style="background-image: url(<?=base_url("img/layout1.png")?>);">
                                    
                                    <?php
                                                if($evento["template"] == "template_aniversario"){
                                                    ?>
                                                    <a href="#" class="btn btn-primary waves-effect waves-light escolherLayout ajax">Esse é seu template atual</a>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <a href="<?=base_url("Cadastro/defineTemplate/template_aniversario")?>" class="btn btn-primary waves-effect waves-light escolherLayout ajax">Escolher
                                        layout 1</a>
                                                    <?php
                                                }
                                            ?>
                                    

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card plan-box">
                                <div class="card-body p-4 boxLayout"
                                    style="background-image: url(<?=base_url("img/layout2.png")?>); <?=(!$evento["id_plano"] ? "opacity: 50%;" : "")?>">
                                   
                                    <?php
                                        if($evento["id_plano"]){
                                            ?>
                                            <?php
                                                if($evento["template"] == "template_casamento"){
                                                    ?>
                                                    <a href="#" class="btn btn-primary waves-effect waves-light escolherLayout ajax">Esse é seu template atual</a>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <a href="<?=base_url("Cadastro/defineTemplate/template_casamento")?>" class="btn btn-primary waves-effect waves-light escolherLayout ajax">Escolher
                                        layout 2</a>
                                                    <?php
                                                }
                                            ?>
                                            
                                            
                                            <?php
                                        }else{
                                            ?>
                                            <a href="<?=base_url("assinaturas")?>" class="btn btn-primary waves-effect waves-light escolherLayout">Escolha um plano para usar esse template</a>
                                            <?php
                                        }
                                    ?>
                                    

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card plan-box">
                                <div class="card-body p-4 boxLayout"
                                    style="background-image: url(<?=base_url("img/layout3.png")?>); <?=(!$evento["id_plano"] ? "opacity: 50%;" : "")?>">
                                   
                                    <?php
                                        if($evento["id_plano"]){
                                            ?>
                                            <?php
                                                if($evento["template"] == "template_baby"){
                                                    ?>
                                                    <a href="#" class="btn btn-primary waves-effect waves-light escolherLayout ajax">Esse é seu template atual</a>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <a href="<?=base_url("Cadastro/defineTemplate/template_baby")?>" class="btn btn-primary waves-effect waves-light escolherLayout ajax">Escolher
                                        layout 3</a>
                                                    <?php
                                                }
                                            ?>
                                            
                                            
                                            <?php
                                        }else{
                                            ?>
                                            <a href="<?=base_url("assinaturas")?>" class="btn btn-primary waves-effect waves-light escolherLayout">Escolha um plano para usar esse template</a>
                                            <?php
                                        }
                                    ?>
                                    

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6">
                            <div class="card plan-box">
                                <div class="card-body p-4 boxLayout"
                                    style="background-image: url(<?=base_url("img/layout4.png")?>); <?=(!$evento["id_plano"] ? "opacity: 50%;" : "")?>">
                                   
                                    <?php
                                        if($evento["id_plano"]){
                                            ?>
                                            <?php
                                                if($evento["template"] == "template_formatura"){
                                                    ?>
                                                    <a href="#" class="btn btn-primary waves-effect waves-light escolherLayout ajax">Esse é seu template atual</a>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <a href="<?=base_url("Cadastro/defineTemplate/template_formatura")?>" class="btn btn-primary waves-effect waves-light escolherLayout ajax">Escolher
                                        layout 4</a>
                                                    <?php
                                                }
                                            ?>
                                            
                                            
                                            <?php
                                        }else{
                                            ?>
                                            <a href="<?=base_url("assinaturas")?>" class="btn btn-primary waves-effect waves-light escolherLayout">Escolha um plano para usar esse template</a>
                                            <?php
                                        }
                                    ?>
                                    

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-sm-12 text-left botoesAcoes">
                        <button type="button" class="btn btn-primary waves-effect waves-light btPadrao">Salvar</button>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>



</div>