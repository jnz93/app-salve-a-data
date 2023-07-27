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
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="flex-1">
                            <div class="font-size-16 mt-2 ">Convidados</div>
                        </div>
                        <div class="flex-1">
                            <div class="font-size-16 mt-2 linkDash"><a href="<?=base_url("convidados")?>">Ver mais</a></div>
                        </div>
                    </div>
                    <h4 class="mt-4"><?=count($convidados)?></h4>
                    <div class="row">
                        <div class="col-12">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="flex-1">
                            <div class="font-size-16 mt-2 ">Presentes</div>
                        </div>
                        <div class="flex-1">
                            <div class="font-size-16 mt-2 linkDash"><a href="<?=base_url("presentes")?>">Ver mais</a></div>
                        </div>
                    </div>
                    <h4 class="mt-4">0</h4>
                    <div class="row">
                        <div class="col-12">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="flex-1">
                            <div class="font-size-16 mt-2 ">Mensagens</div>
                        </div>
                        <div class="flex-1">
                            <div class="font-size-16 mt-2 linkDash"><a href="<?=base_url("mensagens")?>">Ver mais</a></div>
                        </div>
                    </div>
                    <h4 class="mt-4"><?=$mensagens?></h4>
                    <div class="row">
                        <div class="col-12">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="flex-1">
                            <div class="font-size-16 mt-2 ">Visitas</div>
                        </div>
                       
                    </div>
                    <h4 class="mt-4">0</h4>
                    <div class="row">
                        <div class="col-12">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Lista de convidados</h4>

                    <div class="table-responsive">
                        <table class="table table-centered">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Data de convite</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                               // print_r($convidados);
                                    foreach($convidados as $convidado){
                                        ?>
                                        <tr>
                                            <td><?=$convidado["nomeConvidado"]?></td>
                                            <td><?=convertDataN($convidado["inclusao"])?></td>
                                            <td><span class="badge badge-soft-success font-size-12"><?=$convidado["status"]?></span></td>
                                           
                                        </tr>
                                        
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Análise de presentes</h4>

                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <div id="donut-chart" class="apex-charts"></div>
                        </div>
                        <div class="col-sm-12">
                            <div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="py-3">
                                            <p class="mb-1 text-truncate"><i
                                                    class="mdi mdi-circle text-primary me-1"></i> Pendente
                                            </p>
                                            <h5>R$ 0,00</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="py-3">
                                            <p class="mb-1 text-truncate"><i
                                                    class="mdi mdi-circle text-success me-1"></i>
                                                Pagos</p>
                                            <h5>R$ 0,00</h5>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="py-3">
                                            <p class="mb-1 text-truncate"><i
                                                    class="mdi mdi-circle text-warning me-1"></i>
                                                Recusados</p>
                                            <h5>R$ 0,00</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Análise de convidados</h4>

                    <div>
                        <div class="pb-3 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <p class="mb-2">Confirmados</p>
                                    <h4 class="mb-0">0</h4>
                                </div>
                                
                            </div>
                        </div>
                        <div class="py-3 border-bottom">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <p class="mb-2">Pendentes</p>
                                    <h4 class="mb-0">0</h4>
                                </div>
                            </div>
                        </div>
                        <div class="pt-3">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <p class="mb-2">Cancelados</p>
                                    <h4 class="mb-0">0</h4>
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