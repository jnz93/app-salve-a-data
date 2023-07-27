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

                            <h4 class="card-title">Álbum de fotos</h4>
                            <p class="card-title-desc">Compartilhe com seus convidados suas melhores fotos.</p>

                            <div class="row albuns">
                                <div class="col-sm-9">
                                    <div class="row ">
                                        <div class="col-12">
                                            <div class="album linhaAlbumUm" style="<?=($albuns[1]["capa"] == "" ? "" : "background-image: url(".$albuns[1]["capa"].")")?>">
                                                <span class="titAlbum"><?=$albuns[1]["titulo"]?></span>
                                                <span class="quantidadeFotos"><?=$albuns[1]["midias"]?></span>
                                                <a href="<?=base_url("album/".$albuns[1]["id_album"])?>" type="button"
                                                    class="btn btn-primary btn-sm waves-effect waves-light editarAlbum"><span
                                                        class="mdi mdi-brush"></span> Editar Álbum</a>
                                                <form
                                                    action="<?=base_url("Cadastro/trocaCapa/".$albuns[1]["id_album"])?>"
                                                    id="formzone" class="dropzone trocaCapa" enctype='multipart/form-data' data-bs-toggle="tooltip" data-bs-title="Alterar Imagem da capa">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple="multiple">
                                                    </div>
                                                    <div class="dz-message needsclick iconMenorDropZone">
                                                        <div class="mb-3">
                                                            <i
                                                                class=" mdi mdi-image-edit"></i>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-6">
                                            <div class="album linhaAlbumDois" style="<?=($albuns[2]["capa"] == "" ? "" : "background-image: url(".$albuns[2]["capa"].")")?>">
                                                <span class="titAlbum"><?=$albuns[2]["titulo"]?></span>
                                                <span class="quantidadeFotos"><?=$albuns[2]["midias"]?></span>
                                                <a href="<?=base_url("album/".$albuns[2]["id_album"])?>" type="button"
                                                    class="btn btn-primary btn-sm waves-effect waves-light editarAlbum"><span
                                                        class="mdi mdi-brush"></span> Editar Álbum</a>
                                                        <form
                                                    action="<?=base_url("Cadastro/trocaCapa/".$albuns[2]["id_album"])?>"
                                                    id="formzone" class="dropzone trocaCapa" enctype='multipart/form-data' data-bs-toggle="tooltip" data-bs-title="Alterar Imagem da capa">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple="multiple">
                                                    </div>
                                                    <div class="dz-message needsclick iconMenorDropZone">
                                                        <div class="mb-3">
                                                            <i
                                                                class=" mdi mdi-image-edit"></i>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="album linhaAlbumDois" style="<?=($albuns[3]["capa"] == "" ? "" : "background-image: url(".$albuns[3]["capa"].")")?>">
                                                <span class="titAlbum"><?=$albuns[3]["titulo"]?></span>
                                                <span class="quantidadeFotos"><?=$albuns[3]["midias"]?></span>
                                                <a href="<?=base_url("album/".$albuns[3]["id_album"])?>" type="button"
                                                    class="btn btn-primary btn-sm waves-effect waves-light editarAlbum"><span
                                                        class="mdi mdi-brush"></span> Editar Álbum</a>
                                                        <form
                                                    action="<?=base_url("Cadastro/trocaCapa/".$albuns[3]["id_album"])?>"
                                                    id="formzone" class="dropzone trocaCapa" enctype='multipart/form-data' data-bs-toggle="tooltip" data-bs-title="Alterar Imagem da capa">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple="multiple">
                                                    </div>
                                                    <div class="dz-message needsclick iconMenorDropZone">
                                                        <div class="mb-3">
                                                            <i
                                                                class=" mdi mdi-image-edit"></i>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="album linhaAlbumTres" style="<?=($albuns[4]["capa"] == "" ? "" : "background-image: url(".$albuns[4]["capa"].")")?>">
                                                <span class="titAlbum"><?=$albuns[4]["titulo"]?></span>
                                                <span class="quantidadeFotos"><?=$albuns[4]["midias"]?></span>
                                                <a href="<?=base_url("album/".$albuns[4]["id_album"])?>" type="button"
                                                    class="btn btn-primary btn-sm waves-effect waves-light editarAlbum"><span
                                                        class="mdi mdi-brush"></span> Editar Álbum</a>
                                                        <form
                                                    action="<?=base_url("Cadastro/trocaCapa/".$albuns[4]["id_album"])?>"
                                                    id="formzone" class="dropzone trocaCapa" enctype='multipart/form-data' data-bs-toggle="tooltip" data-bs-title="Alterar Imagem da capa">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple="multiple">
                                                    </div>
                                                    <div class="dz-message needsclick iconMenorDropZone">
                                                        <div class="mb-3">
                                                            <i
                                                                class=" mdi mdi-image-edit"></i>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="album linhaAlbumTres" style="<?=($albuns[5]["capa"] == "" ? "" : "background-image: url(".$albuns[5]["capa"].")")?>">
                                                <span class="titAlbum"><?=$albuns[5]["titulo"]?></span>
                                                <span class="quantidadeFotos"><?=$albuns[5]["midias"]?></span>
                                                <a href="<?=base_url("album/".$albuns[5]["id_album"])?>" type="button"
                                                    class="btn btn-primary btn-sm waves-effect waves-light editarAlbum"><span
                                                        class="mdi mdi-brush"></span> Editar Álbum</a>
                                                        <form
                                                    action="<?=base_url("Cadastro/trocaCapa/".$albuns[5]["id_album"])?>"
                                                    id="formzone" class="dropzone trocaCapa" enctype='multipart/form-data' data-bs-toggle="tooltip" data-bs-title="Alterar Imagem da capa">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple="multiple">
                                                    </div>
                                                    <div class="dz-message needsclick iconMenorDropZone">
                                                        <div class="mb-3">
                                                            <i
                                                                class=" mdi mdi-image-edit"></i>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="album linhaAlbumTres" style="<?=($albuns[6]["capa"] == "" ? "" : "background-image: url(".$albuns[6]["capa"].")")?>">
                                                <span class="titAlbum"><?=$albuns[6]["titulo"]?></span>
                                                <span class="quantidadeFotos"><?=$albuns[6]["midias"]?></span>
                                                <a href="<?=base_url("album/".$albuns[6]["id_album"])?>" type="button"
                                                    class="btn btn-primary btn-sm waves-effect waves-light editarAlbum"><span
                                                        class="mdi mdi-brush"></span> Editar Álbum</a>
                                                        <form
                                                    action="<?=base_url("Cadastro/trocaCapa/".$albuns[6]["id_album"])?>"
                                                    id="formzone" class="dropzone trocaCapa" enctype='multipart/form-data' data-bs-toggle="tooltip" data-bs-title="Alterar Imagem da capa">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple="multiple">
                                                    </div>
                                                    <div class="dz-message needsclick iconMenorDropZone">
                                                        <div class="mb-3">
                                                            <i
                                                                class=" mdi mdi-image-edit"></i>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light btPadrao" onclick="location.reload();" style="margin-top: 50px;">Salvar</button>
                        </div>
                        </p>
                    </div>


                </div>

            </div>
        </div>
    </div>

</div>
<!-- end row -->
</div>