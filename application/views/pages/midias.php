<style>
    .dropzoneGal {
    text-align: center;
    padding: 50px;
    border-radius: 20px;
    min-height: 150px;
    border: 2px solid rgba(0,0,0,0.3);
    background: white;
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
                    <div class="tab-content p-3 text-muted">
                        <div class="card-body">
                            <?php if($evento["id_plano"] == 2){ ?>
                                <a href="<?=base_url("albunsmidia")?>" type="button" class="btn btn-primary btn-sm waves-effect waves-light voltaPagina"><span class="mdi mdi-folder-multiple-image"></span> Voltar para albúns</a>
                            <?php } ?>
                            <h4 class="card-title">Álbum de fotos - <?=$album["titulo"]?></h4>
                            <p class="card-title-desc">Compartilhe com seus convidados suas melhores fotos.</p>
                            <div class="row nomeAlbumForm">
                                <div class="col-6">
                                    <form action="<?=base_url("Ajax/alteraNomeAlbum/".$album["id_album"])?>"
                                        class="ajax row">
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="titulo" placeholder="Nome do Álbum" value="<?=$album["titulo"]?>">
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light btSalvaIput">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <button type="button"
                                        class="btn btn-primary btn-sm waves-effect waves-light abreEnviaImagens"><span
                                            class="mdi mdi-plus-thick"></span> Adicionar fotos</button>
                                </div>
                                <?php
                                $totalFotos = count($midias);
                                    if($totalFotos < 5 || $evento["id_plano"]){
                                        $textoLimite = "";
                                        $faltamFotos = 5-$totalFotos;
                                        if(!$evento["id_plano"]){
                                            if($faltamFotos == 1){
                                                $pluralFotos = "foto";
                                            }else{
                                                $pluralFotos = "fotos";
                                            }
                                            $textoLimite = " (Você pode enviar mais ".$faltamFotos." ".$pluralFotos.")";
                                        }
                                        ?>
                                    <div class="uploadFotos row box-filtro" style="display:none;">
                                        <h4 class="card-title">Envie suas fotos</h4>
    
    
                                        <div>
                                            <form action="<?=base_url("Cadastro/enviaImagens/".$album["id_album"])?>"
                                                id="formzoneGal" class="dropzoneGal" enctype='multipart/form-data'>
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple="multiple">
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted mdi mdi-file-image-outline"></i>
                                                    </div>
    
                                                    <h4>Arraste suas fotos para enviar. <?=$textoLimite?></h4>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class="uploadFotos row box-filtro" style="display:none;">
                                        
                                        <a href="<?=base_url("assinaturas")?>" type="button" class="btn btn-primary btn-sm waves-effect waves-light abreEnviaImagens">
                                            <span class="mdi mdi-plus-thick"></span> Você atingiu o limite máximo de fotos do seu plano, clique aqui para selecionar um plano ou exclua arquivos existentes.
                                        </a>
    
                                        <div>
                                            
                                        </div>
                                    </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="row albuns">
                                <?php # echo '<pre>'; print_r($midias); echo '</pre>'; ?>
                                <?php foreach($midias as $midia){ ?>
                                    <div class="col-sm-3">
                                        <div class="linhaAlbumMidia">
                                            <?php
                                            $extensao = strtolower(pathinfo($midia['midia'], PATHINFO_EXTENSION));
                                            $allowedImages = ['jpg', 'jpeg', 'png', 'gif'];
                                            $allowedVideos = ['mp4', 'avi', 'mkv', 'mov', 'wmv'];
                                            if(in_array($extensao, $allowedImages)): ?>
                                                <img src="<?=$midia["midia"]?>" class="midiaAlbum">
                                            <?php else : ?>
                                                <video src="<?=$midia['midia']?>" autoplay="false" controls style="max-width: 245px;"></video>
                                            <?php endif; ?>
                                            <a href="<?=base_url("Ajax/deletarMidia/".$midia["id_midia"]."/".$album["id_album"])?>" class="deletarFoto ajax" data-bs-toggle="tooltip" data-bs-placement="top" title="Deletar Imagem">
                                                <span class="mdi mdi-delete-circle-outline"></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

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
<script>
    var maxArquivos = 100;
</script>
<?php
    if(!$evento["id_plano"]){
        ?>
        <script>
            maxArquivos = <?=$faltamFotos?>;
        </script>
        
        <?php
    }
?>