<script>
var agencias = {
    "Banco do Brasil": "9999-9",
    "Santander": "9999",
    "Caixa Econômica": "9999",
    "Caixa Econômica": "9999",
    "Bradesco": "9999-9",
    "Next": "9999-9",
    "Itaú": "9999",
    "Agibank": "9999",
    "Banpará": "9999",
    "Banrisul": "9999",
    "Sicredi": "9999",
    "Sicoob": "9999",
    "Inter": "9999",
    "BRB": "9999",
    "Via Credi": "9999",
    "Neon": "9999",
    "Votorantim": "9999",
    "Nubank": "9999",
    "Pagseguro": "9999",
    "Banco Original": "9999",
    "Safra": "9999",
    "Modal": "9999",
    "Banestes": "9999",
    "Unicred": "9999",
    "Money Plus": "9",
    "Mercantil do Brasil": "9999",
    "JP Morgan": "9999",
    "Gerencianet Pagamentos do Brasil": "9999",
    "Banco C6": "9999",
    "BS2": "9999",
    "Banco Topazio": "9999",
    "Uniprime": "9999",
    "Stone": "9999",
    "Banco Daycoval": "9999",
    "Rendimento": "9999-9",
    "Banco do Nordeste": "999",
    "Citibank": "9999",
    "PJBank": "9999",
    "Cooperativa Central de Credito Noroeste Brasileiro": "9999",
    "Uniprime Norte do Paraná": "9999",
    "Global SCM": "9999",
    "Cora": "9999",
    "Mercado Pago": "9999",
    "Banco da Amazonia": "9999",
    "BNP Paribas Brasil": "999",
    "Juno": "9999",
    "Cresol": "9999-9",
    "BRL Trust DTVM": "999",
    "Banco Banese": "999",
    "Banco BTG Pactual": "9999",
    "Banco Omni": "9999",
};
var contas = {
    "Banco do Brasil": "99999999-9",
    "Santander": "99999999-9",
    "Caixa Econômica": "99999999999-9",
    "Caixa Econômica": "999999999999-9",
    "Bradesco": "9999999-9",
    "Next": "9999999-9",
    "Itaú": "99999-9",
    "Agibank": "9999999999",
    "Banpará": "999999999-9",
    "Banrisul": "999999999-9",
    "Sicredi": "9999999",
    "Sicoob": "999999999-9",
    "Inter": "999999999-9",
    "BRB": "999999999-9",
    "Via Credi": "99999999999-9",
    "Neon": "999999999-9",
    "Votorantim": "999999999-9",
    "Nubank": "9999999999-9",
    "Pagseguro": "99999999-9",
    "Banco Original": "9999999-9",
    "Safra": "99999999-9",
    "Modal": "999999999-9",
    "Banestes": "99999999-9",
    "Unicred": "99999999-9",
    "Money Plus": "99999999-9",
    "Mercantil do Brasil": "99999999-9",
    "JP Morgan": "99999999999-9",
    "Gerencianet Pagamentos do Brasil": "99999999-9",
    "Banco C6": "99999999-9",
    "BS2": "999999-9",
    "Banco Topazio": "99999-9",
    "Uniprime": "99999-9",
    "Stone": "9999999-9",
    "Banco Daycoval": "999999-9",
    "Rendimento": "9999999999",
    "Banco do Nordeste": "999999-9",
    "Citibank": "99999999",
    "PJBank": "9999999999-9",
    "Cooperativa Central de Credito Noroeste Brasileiro": "9999999-9",
    "Uniprime Norte do Paraná": "999999-9",
    "Global SCM": "99999999999",
    "Cora": "9999999-9",
    "Mercado Pago": "9999999999-9",
    "Banco da Amazonia": "999999-9",
    "BNP Paribas Brasil": "999999-999",
    "Juno": "9999999999-9",
    "Cresol": "99999-9",
    "BRL Trust DTVM": "999999-9",
    "Banco Banese": "99999999-9",
    "Banco BTG Pactual": "99999-9",
    "Banco Omni": "999999-9",
}
</script>
<?php
$bancos = array(
    'Itaú', 'Bradesco', 'Caixa Econômica', 'Banco do Brasil', 'Santander', 'Banrisul', 'Sicredi', 'Sicoob', 'Inter', 'BRB', 'Via Credi', 'Neon', 'Votorantim', 'Nubank', 'Pagseguro', 'Banco Original', 'Safra', 'Modal', 'Banestes', 'Unicred', 'Money Plus', 'Mercantil do Brasil', 'JP Morgan', 'Gerencianet Pagamentos do Brasil', 'Banco C6', 'BS2', 'Banco Topazio', 'Uniprime', 'Stone', 'Banco Daycoval', 'Rendimento', 'Banco do Nordeste', 'Citibank', 'PJBank', 'Cooperativa Central de Credito Noroeste Brasileiro', 'Uniprime Norte do Paraná', 'Global SCM', 'Next', 'Cora', 'Mercado Pago', 'Banco da Amazonia', 'BNP Paribas Brasil', 'Juno', 'Cresol', 'BRL Trust DTVM', 'Banco Banese', 'Banco BTG Pactual', 'Banco Omni'
);
?>
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


                            <?php
                            
                                if($evento["access_token"] == ""){
                            ?>
                            <div class="novoCheckout">
                                <div class="row">
                                    <div class="col-sm-12"><br>
                                        <h4 class="card-title">Configurações para recebimento</h4>
                                        <p class="card-title-desc">Antes de criar a sua lista, cadastre as informações abaixo para o recebimento dos presentes.</p>
                                    </div>

                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form action="<?=base_url("Cadastro/novoAccessToken")?>" class="row ajax">
                                            <div class="col-sm-6 campoForm">
                                                <label>Nome completo</label>
                                                <input type="text" name="nome" class="form-control" placeholder="Nome">
                                            </div>
                                            <div class="col-sm-6 campoForm">
                                                <label>CPF</label>
                                                <input type="text" name="cpf" class="form-control" placeholder="CPF">
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


                                            <h2>Endereço:</h2>

                                            <div class="row">
                                                <div class="col-sm-6 campoForm">
                                                    <label>Cep</label>
                                                    <input type="text" name="cep" class="form-control getCep"
                                                        placeholder="CEP" value="<?=$endereco["cep"]?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-6 campoForm">
                                                <label>Rua/ Avenida</label>
                                                <input type="text" name="rua" class="form-control logradouro getMaps"
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
                                            <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: -20px;">
                                                <label>Descreva seu evento</label>
                                                <textarea type="text" id="complaintinput3" class="form-control round"
                                                    name="descricaonegocio"></textarea>
                                            </div>
                                            <div class="bug-list-search">
                                                <h2 class="form-section">Informações bancários:
                                                    </h4>
                                                    <div class="bug-list-search-content">
                                                        <div class="sidebar-toggle d-block d-lg-none"><i
                                                                class="ft-menu font-large-1"></i></div>
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <label>Tipo
                                                                            da conta</label>
                                                                    </div>
                                                                    <div class="d-block my-2 row"
                                                                        style="margin-bottom:-15px;">
                                                                        <div
                                                                            class="custom-control custom-radio col-sm-12 col-md-4 col-lg-4">
                                                                            <input id="corrente" type="radio"
                                                                                class="custom-control-input" checked=""
                                                                                required="" name="tipo_conta"
                                                                                value="corrente">
                                                                            <label class="custom-control-label"
                                                                                for="corrente">Corrente</label>
                                                                        </div>
                                                                        <div
                                                                            class="custom-control custom-radio col-sm-12 col-md-4 col-lg-4">
                                                                            <input id="poupanca" type="radio"
                                                                                class="custom-control-input" required=""
                                                                                name="tipo_conta" value="poupanca">
                                                                            <label class="custom-control-label"
                                                                                for="poupanca"
                                                                                value="poupanca">Poupança</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-3">
                                                                        <label>Bancos</label>
                                                                        <select id="bancos" name="banco"
                                                                            class="form-control"
                                                                            style="border-radius: 15px;">
                                                                            <option value="">Bancos</option>
                                                                            <?php
                                                                            foreach($bancos as $banco){
                                                                                echo "<option value='$banco'>$banco</option>";
                                                                            }
                                                                        ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-12 col-sm-4">
                                                                        <label>Agencia</label>
                                                                        <input type="text" id="agencia"
                                                                            class="form-control round" name="agencia"
                                                                            value="">
                                                                    </div>
                                                                    <div class="col-12 col-sm-5">
                                                                        <label>Número da Conta</label>
                                                                        <input type="text" id="numeroconta"
                                                                            class="form-control round" name="n_conta"
                                                                            value="">
                                                                    </div>
                                                                    <p
                                                                        style="margin-left: 20px;margin-top: 10px;margin-bottom: -35px;font-size: 14px;">
                                                                        "Os dados do seu cartão de crédito, são
                                                                        informações
                                                                        confidenciais, sendo assim não são salvos na
                                                                        loja."
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>
                                                        </div>
                                                    </div>
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
                            <?php
                                }else{
                                    ?>
                            <h4 class="card-title">Lista de presentes</h4>
                            <p class="card-title-desc">Crie e cadastre sua lista de presentes de forma personalizada. <a href="<?=base_url("politicas/contratosalveadata.pdf")?>" target="_BLANK">Leia o regulamento para conhecer as políticas de recebimento.</a></p>
                            <label class="switch">
                                    <input type="checkbox" name="repasseJuros" <?=($evento["repasseJuros"] ? "checked" : "")?>>
                                    <span class="slider round"></span>
                                </label>
                                <label style="
    top: 6px;
    position: relative;
">Repassar juros</label>
<p class="card-title-desc">Acionando esse botão as taxas e impostos do valor dos presentes ficam por conta do convidado.</p>
                            <form class="row box-filtro">
                               
                                
                                <div class="col-sm-10">
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
                                </form>

                            <div class="row box-filtro">
                                <div class="col-sm-2">
                                    <button type="button"
                                        class="btn btn-primary btn-sm waves-effect waves-light abreCadastroConvidado"><span
                                            class="mdi mdi-plus-thick"></span> Novo Presente</button>
                                </div>
                                <!-- <div class="col-sm-3">
                                    <button type="button"
                                        class="btn btn-primary btn-sm waves-effect waves-light abreCadastroMassa"><span
                                            class="mdi mdi-upload-outline"></span> Cadastrar em massa</button>
                                </div> -->
                            </div>
                            <div class="novoConvidado" style="display:none;">
                                <div class="row box-filtro">
                                    <div class="col-sm-12"><br>
                                        <h4 class="card-title">Cadastro de presente</h4>
                                        <p class="card-title-desc">Cadastre aqui os presentes.</p>
                                    </div>

                                </div>
                                <div class="row box-filtro">
                                    <div class="col-sm-12">
                                        <form class="row" action="<?=base_url("Cadastro/presente")?>" method="post"
                                            enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-6 campoForm">
                                                    <label>Imagem</label>
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" id="inputGroupFile02"
                                                            name="imagemPresente">
                                                        <label class="input-group-text"
                                                            for="inputGroupFile02">Upload</label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-6 campoForm">
                                                <label>Produto</label>
                                                <input type="text" name="nomePresente" class="form-control"
                                                    placeholder="Nome do presente">
                                            </div>
                                            <div class="col-sm-6 campoForm">
                                                <label>Valor</label>
                                                <input type="text" name="valorPresente" class="form-control"
                                                    placeholder="R$••,••" onKeyPress="return(MascaraMoeda(this,event))">
                                            </div>
                                            <div class="col-sm-12 campoForm">
                                                <label>Descrição</label>
                                                <textarea type="text" name="descricaoPresente" class="form-control"
                                                    placeholder="Descrição do presente"></textarea>
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
                                <h4 class="card-title">Enviar Presentes em massa</h4>
                                <p class="card-title-desc">
                                    Faça o download do modelo da <a href="#">planilha aqui</a>
                                </p>

                                <div>
                                    <form action="#" class="dropzone">
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
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Enviar
                                        arquivo</button>
                                </div>
                            </div>
                            <p class="card-title-desc">
                            Você poderá adicionar e atualizar a sua lista de presentes à qualquer momento.
                                </p>

                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Imagem</th>
                                                <th data-priority="1" class="text-center">Produto</th>
                                                <th data-priority="3" class="text-center">Última atualização</th>
                                                <th data-priority="3" class="text-center">Valor cadastrado</th>
                                                <?php
                                                    if($evento["repasseJuros"]){
                                                        ?>
                                                    <th data-priority="3" class="text-center">Taxas e impostos</th>
                                                    <th data-priority="3" class="text-center">Valor total</th>
                                                <?php
                                                    }else{
                                                        ?>
                                                        <th data-priority="3" class="text-center">Taxas e impostos</th>
                                                        <?php
                                                    }
                                                ?>
                                                <!-- <th data-priority="3" class="text-center">Status</th> -->
                                                <th data-priority="1" class="text-center">Detalhes</th>
                                                <!-- <th data-priority="1" class="text-center">Editar</th> -->
                                                <th data-priority="3" class="text-center">Remover</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($presentes as $presente){
                                                    ?>
                                            <tr class="listaPresentes">
                                                <?php
                                                    if($presente["imagem"] != ""){
                                                        echo '<th class="text-center"><span class="imagem"><img src="'.$presente["imagem"].'" class="fotoPresente"></span></th>';
                                                    }else{
                                                        echo '<th class="text-center"><span class="semImagem"><p class="mdi mdi-plus-thick"></p></span></th>';
                                                    }
                                                ?>

                                                <td class="text-center"><?=$presente["produto"]?></td>
                                                <td class="text-center"><?=convertData($presente["inclusao"])?></td>
                                                <td class="text-center"><?=nf($presente["valor"])?></td>
                                                <?php
                                                    if($evento["repasseJuros"]){
                                                        ?>
                                                    <td class="text-center"><?=nf($presente["valorRepasse"])?></td>
                                                    <td class="text-center"><?=nf($presente["valor"]+$presente["valorRepasse"])?></td>
                                                <?php
                                                    }else{
                                                        ?>
                                                        <td class="text-center"><?=nf(($presente["valor"]/100)*$juros)?></td>
                                                        <?php
                                                    }
                                                ?>
                                                <!-- <td class="text-center"><span
                                                        class="badge rounded-pill bg-success">Ativo</span></td> -->
                                                <td class="text-center"><a
                                                        href="<?=base_url("Ajax/modalPresente/".$presente["id_presente"])?>"
                                                        class="ajax editar"><span
                                                            class="mdi mdi-clipboard-text-outline"></span></a></td>
                                                <!-- <td class="text-center"><a href="#" class="ajax editar"><span
                                                            class="mdi mdi-square-edit-outline"></span></a></td> -->
                                                <td class="text-center"><a
                                                        href="<?=base_url("Cadastro/deletarPresente/".$presente["id_presente"])?>"
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
                            <?php
                                }
                            ?>
                        </div>
                        </p>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>

<div id="visualizaPresente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
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