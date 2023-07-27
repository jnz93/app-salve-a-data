<div class="">
       <div class="row">
        <div class="col-sm-12">
            <form action="<?=base_url("Templates/confirmarPresenca")?>" class="row ajax">
                <input type="hidden" name="handle" value="<?=$evento["slug"]?>">
                <div class="col-sm-6 campoForm">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome">
                </div>
                <div class="col-sm-6 campoForm">
                    <label>Sobrenome</label>
                    <input type="text" name="sobrenome" class="form-control" placeholder="Sobrenome">
                </div>
                <div class="col-sm-6 campoForm">
                    <label>Telefone</label>
                    <input type="text" name="telefone" class="form-control" placeholder="Telefone">
                </div>
                <div class="col-sm-6 campoForm">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="E-mail">
                </div>

                <?php
                                    if($evento["acompanhanteLista"]){
                                        ?>
                <div class="col-sm-12 campoForm">
                    <label>Seus acompanhantes:</label>
                    <textarea name="acompanhantes" class="form-control"
                        placeholder="Caso deseje levar alguém junto, coloque o nome aqui"></textarea>
                </div>
                <?php
                                    }
                                ?>
                <div class="col-sm-12 text-center botoesAcoes">
                    <button type="submit" class="btn btn-primary waves-effect waves-light btConfirma">Confirmar</button>

                </div>

            </form>
        </div>

    </div>

</div>