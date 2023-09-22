<style>
    .home-intro .content h2 .color-highlight {
        color: <?=$config["corTitulosBanner"]?>;

    }

    p.dataEvento {
    font-size: 24px;
    font-weight: bold;
    text-transform: lowercase;
    color: <?=$config["corTitulosBanner"]?>;
}

    

    h3.titleDireito {
        font-style: normal;
        font-weight: 700;
        font-size: 43px;
        line-height: 70px;
        letter-spacing: -0.005em;
        color: <?=$config["corTitulosBanner"]?>;
    }

   
    h3.titleCentro {
        font-style: normal;
        font-weight: 700;
        font-size: 48px;
        line-height: 70px;
        text-align: center;
        letter-spacing: -0.005em;
        color: <?=$config["corTitulos"]?>;
        margin: 100px 0 0 0;
    }

    

    /* footer {
        background: <?=$config["corPrincipal"]?>;
        padding: 0;
    } */

   

    nav.navbar.navbar-expand-md.navbar-light {
        background: <?=$config["corPrincipal"]?>;
        padding: 0px;
    }
    <?php
        if(strlen($config["corContadorTempo"]) > 1 ){
            ?>
            #countdown li{
                background: <?= $config["corContadorTempo"]?> !important;
            }
            
            <?php
        } else {
            ?>
            #countdown li{
                background: <?=$config["corPrincipal"]?> !important;
            }
            <?php
        }
    ?>

    .navbar .navbar-nav li .nav-link {
        font-size: 15px;
        font-weight: 500;
        transition: all .3s ease;
        color: <?=$config["corTextoMenu"]?>;
    }

    .navbar-light .navbar-brand {
        color: rgba(0, 0, 0, 0.9);
        background: <?=$config["corComplementar"]?>;
        box-shadow: 0px 2px 2px rgb(0 0 0 / 10%);
        border-radius: 0px 0px 20px 20px;
        top: -21px;
        position: absolute;
        padding: 40px 0px;
    }

    .inicialTopo{
        color: <?=$config["corTextoMenu"]?> !important;
    }

    

    h2.tituloSobre {
        font-style: normal;
        font-weight: 600;
        font-size: 40px;
        line-height: 80px;
        letter-spacing: -0.005em;
        color: <?=$config["corTitulos"]?>;
    }

    .btConfirma {
        background: <?=$config["corPrincipal"]?> !important;
        border: 1px solid #E7ECF3 !important;
        border-radius: 4px !important;
        width: 200px !important;
    }
    .fundoListaPresente{
        background: <?=$config["corPrincipal"]?> !important;
    }
    .home-intro.bgBanner{
        background-color:<?=$config["corPrincipal"]?> !important;
    }
    

    

    p.descricaoMensagem {
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: <?=$config["corTextosBanner"]?>;
        padding: 0 140px;
    }

div#portfolio {
    background: <?=$config["corPrincipal"]?> !important;
}

.bannerMensagens{
        background: <?=$config["corFundoMsg"]?>;
        height: auto !important;
    }

div#countdown ul {
    margin: 25px;
}

.textoPadrao p,.textoPadrao h3{
        color: <?=$config["corTextosBanner"]?> !important;
    }
   

   
    </style>