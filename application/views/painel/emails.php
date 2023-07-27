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

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">


                    <p class="mb-0">
                    
                    

                    <div class="card-body">
                    <div class="row">
                            <div class="col-sm-12"><br>
                                <h4 class="card-title">E-mail boas vindas</h4>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="<?=base_url("Painel/salvaEmail/".$nav)?>" class="row ajax formPagina">
                                <input type="hidden" name="tipo" value="<?=$nav?>">
                                    <div class="col-sm-12 campoForm">
                                        <label>Título</label>
                                        <input type="text" name="assunto" class="form-control" placeholder="o título será o assunto do e-mail" value="<?=$dadosEmail["assunto"]?>">
                                    </div>
                                    <div class="col-sm-12 campoForm">
                                        <label>E-mail</label>
                                        <textarea id="editor" name="email"><?=$dadosEmail["texto"]?></textarea>
                                    </div>
                                    <div class="col-sm-12 text-left botoesAcoes">
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light btPadrao">Salvar</button>

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
    <!-- end row -->
</div>