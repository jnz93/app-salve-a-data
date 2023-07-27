<?php
    //if($evento["id_plano"]){
        ?>
        <!-- <div class="row albuns"> -->
                        <!-- <div class="col-sm-9">
                            <?php
                                if( $albuns[1]["midias"] != "0 Mídias"){
                                    ?>
                                    <div class="row ">
                                        <div class="col-12 popup-gallery">
                                            <a class="float-start" href="<?=$albuns[1]["capa"]?>" title="">
                                                <div class="album linhaAlbumUm"
                                                    style="<?=($albuns[1]["capa"] == "" ? "" : "background-image: url(".$albuns[1]["capa"].")")?>">
                                                    <span class="titAlbum"><?=$albuns[1]["titulo"]?> -
                                                        <?=$albuns[1]["midias"]?></span>
                                                    <span class="quantidadeFotos"></span>
        
                                                </div>
                                            </a>
                                            <?php
                                            foreach($midias[$albuns[1]["id_album"]] as $midia){
                                                ?>
                                            <a class="float-start" href="<?=$midia["midia"]?>" title="" style="display: none;">
                                                <div class="img-fluid">
                                                    <img src="<?=$midia["midia"]?>" alt="" width=" 120">
                                                </div>
                                            </a>
                                            <?php
                                            }
                                        ?>
        
        
                                        </div>
                                    </div>
                                    
                                    <?php
                                }
                            ?>
                             
                            <div class="row ">
                                <div class="col-12 col-sm-6 popup-gallery">
                                <?php
                                if( $albuns[2]["midias"] != "0 Mídias"){
                                    ?>
                                    <a class="float-start" href="<?=$albuns[2]["capa"]?>" title="">
                                        <div class="album linhaAlbumDois"
                                            style="<?=($albuns[2]["capa"] == "" ? "" : "background-image: url(".$albuns[2]["capa"].")")?>">
                                            <span class="titAlbum"><?=$albuns[2]["titulo"]?> -
                                                <?=$albuns[2]["midias"]?></span>
                                        </div>
                                    </a>
                                    <?php
                                    foreach($midias[$albuns[2]["id_album"]] as $midia){
                                        ?>
                                    <a class="float-start" href="<?=$midia["midia"]?>" title="" style="display: none;">
                                        <div class="img-fluid">
                                            <img src="<?=$midia["midia"]?>" alt="" width=" 120">
                                        </div>
                                    </a>
                                    <?php
                                    }
                                ?>
                                <?php
                                }
                            ?>
                                </div><br>

                                <div class="col-12 col-sm-6 popup-gallery">
                                <?php
                                if( $albuns[3]["midias"] != "0 Mídias"){
                                    ?>
                                    <a class="float-start" href="<?=$albuns[3]["capa"]?>" title="">
                                        <div class="album linhaAlbumDois"
                                            style="<?=($albuns[3]["capa"] == "" ? "" : "background-image: url(".$albuns[3]["capa"].")")?>">
                                            <span class="titAlbum"><?=$albuns[3]["titulo"]?> -
                                                <?=$albuns[3]["midias"]?></span>
                                        </div>
                                    </a>
                                    <?php
                                    foreach($midias[$albuns[3]["id_album"]] as $midia){
                                        ?>
                                    <a class="float-start" href="<?=$midia["midia"]?>" title="" style="display: none;">
                                        <div class="img-fluid">
                                            <img src="<?=$midia["midia"]?>" alt="" width=" 120">
                                        </div>
                                    </a>
                                    <?php
                                    }
                                ?>
                                 <?php
                                    }
                                ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="row">
                            <?php
                                if( $albuns[4]["midias"] != "0 Mídias"){
                                    ?>
                                <div class="col-12 popup-gallery">
                                    <a class="float-start" href="<?=$albuns[4]["capa"]?>" title="">
                                        <div class="album linhaAlbumTres"
                                            style="<?=($albuns[4]["capa"] == "" ? "" : "background-image: url(".$albuns[4]["capa"].")")?>">
                                            <span class="titAlbum"><?=$albuns[4]["titulo"]?> -
                                                <?=$albuns[4]["midias"]?></span>
                                        </div>
                                    </a>
                                    <?php
                                    foreach($midias[$albuns[4]["id_album"]] as $midia){
                                        ?>
                                    <a class="float-start" href="<?=$midia["midia"]?>" title="" style="display: none;">
                                        <div class="img-fluid">
                                            <img src="<?=$midia["midia"]?>" alt="" width=" 120">
                                        </div>
                                    </a>
                                    <?php
                                    }
                                ?>
                                <?php
                                    }
                                ?>
                                </div>
                                <div class="col-12 popup-gallery">
                                <?php
                                if( $albuns[5]["midias"] != "0 Mídias"){
                                    ?>
                                    <a class="float-start" href="<?=$albuns[5]["capa"]?>" title="">
                                        <div class="album linhaAlbumTres"
                                            style="<?=($albuns[5]["capa"] == "" ? "" : "background-image: url(".$albuns[5]["capa"].")")?>">
                                            <span class="titAlbum"><?=$albuns[5]["titulo"]?> -
                                                <?=$albuns[5]["midias"]?></span>
                                        </div>
                                    </a>
                                    <?php
                                    foreach($midias[$albuns[5]["id_album"]] as $midia){
                                        ?>
                                    <a class="float-start" href="<?=$midia["midia"]?>" title="" style="display: none;">
                                        <div class="img-fluid">
                                            <img src="<?=$midia["midia"]?>" alt="" width=" 120">
                                        </div>
                                    </a>
                                    <?php
                                    }
                                ?>
                                <?php
                                    }
                                ?>
                                </div>
                                <div class="col-12 popup-gallery">
                                <?php
                                if( $albuns[6]["midias"] != "0 Mídias"){
                                    ?>
                                    <a class="float-start" href="<?=$albuns[6]["capa"]?>" title="">
                                        <div class="album linhaAlbumTres"
                                            style="<?=($albuns[6]["capa"] == "" ? "" : "background-image: url(".$albuns[6]["capa"].")")?>">
                                            <span class="titAlbum"><?=$albuns[6]["titulo"]?> -
                                                <?=$albuns[6]["midias"]?></span>
                                        </div>
                                    </a>
                                    <?php
                            
                                    foreach($midias[$albuns[6]["id_album"]] as $midia){
                                        ?>
                                    <a class="float-start" href="<?=$midia["midia"]?>" title="" style="display: none;">
                                        <div class="img-fluid">
                                            <img src="<?=$midia["midia"]?>" alt="" width=" 120">
                                        </div>
                                    </a>
                                    <?php
                                    }
                                ?>
                                <?php
                                    }
                                ?>
                                </div>

                            </div>

                        </div>
                    </div> -->
        <?php
   // }else{

        ?>
        <style>
            a.float-start.midia {
    display: inline-block;
}
            </style>
        
        <div class="row albuns">
                        <div class="col-sm-12">
                            <div class="row ">
                                <div class="col-12 popup-gallery">
                                    
                                    <?php
                                    foreach($midias[$albuns[1]["id_album"]] as $midia){
                                        ?>
                                    <a class="float-start midia" href="<?=$midia["midia"]?>" title="">
                                        <div class="img-fluid">
                                            <img src="<?=$midia["midia"]?>" alt="" width=" 120">
                                        </div>
                                    </a>
                                    <?php
                                    }
                                ?>


                                </div>
                            </div>
                            
                        </div>
                        
                        
                    </div>
        <?php

   // }
?>
