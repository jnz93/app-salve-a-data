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
                    <div class="tab-content p-3 text-muted">
                        <div class="card-body">

                            <h4 class="card-title">Lista de presentes</h4>
                            <p class="card-title-desc">Aqui está seus presentes recebidos.</p>
                            <div class="row box-filtro">
                                <div class="col-sm-3">
                                    <label>Filtro de data</label>
                                    <input type="date" class="form-control" name="filtroData">
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
                                <div class="col-sm-4">
                                    <label>Buscar por nome</label>
                                    <input type="text" class="form-control" name="filtroNome"
                                        placeholder="Digite o nome do presente">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit"
                                        class="btn btn-primary btn-sm waves-effect waves-light btSearh">
                                        <p class="bx bx-search-alt"></p>
                                    </button>
                                </div>
                            </div>

                            
                            

                            

                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                
                                                <th data-priority="1" class="text-center">Convidado</th>
                                                <th data-priority="3" class="text-center">Última atualização</th>
                                                <th data-priority="3" class="text-center">Status</th>
                                                <th data-priority="1" class="text-center">Mensagem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($presentes as $presente){
                                                    ?>
                                                    <tr class="listaPresentes">
                                                       
                                                        <td class="text-center"><?=$presente["name"]?></td>
                                                        <td class="text-center"><?=convertData($presente["inclusao"])?></td>
                                                        <td class="text-center"><span
                                                                class="badge rounded-pill bg-success">Finalizado</span></td>
                                                        <td class="text-center"><?=$presente["observacao"]?></td>
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

<div id="visualizaPresente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Detalhes do presente
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <img class="card-img-top img-fluid" src="<?=base_url("assets/images/small/img-2.jpg")?>"
                        alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mt-0">Produto Teste</h4>
                        <p class="card-text">Some quick example text to build on the card title and make up
                            the bulk of the card's content.</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">R$19,90</li>
                    </ul>

                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- end row -->
</div>