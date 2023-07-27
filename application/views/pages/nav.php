<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <?php
            if($evento["video"] != ""){
                ?>
        <li class="nav-item">
            <a class="sound" data-tipo="mute">
                <p class="ion-ios-volume-mute"></p>
            </a>
        </li>
        <?php
            }
                ?>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url("site/".$evento["slug"])?>">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?=base_url("site/".$evento["slug"])?><?=(isset($pagina) ? '/fotos' : '#fotos')?>"  >Mídias e Albúns</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url("lista/".$evento["slug"])?>">Lista de presentes</a>
        </li>
        <?php
            if($config["template"] == "template_baby"){
                ?>
                 <li class="nav-item" style="
    width: 110px;
">
            <a href="<?=base_url("site/".$evento["slug"])?>" class="navbar-brand inicialTopo topoBaby"><?=$iniciais?></a>
                 </li>
                <?php
            }
        ?>

        <li class="nav-item">
            <a class="nav-link" href="<?=base_url("site/".$evento["slug"])?><?=(isset($pagina) ? '/presenca' : '#presenca')?>">Confirmar presença</a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                data-toggle="dropdown" aria-expanded="false">
                Outras páginas
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <?php
                        foreach($paginas as $pagina){
                            ?>
                <a class="dropdown-item"
                    href="<?=base_url("pagina/".$evento["slug"]."/".$pagina["handle"])?>"><?=$pagina["titulo"]?></a>
                <?php
                        }
                    ?>


            </div>
        </li>


    </ul>
</div>