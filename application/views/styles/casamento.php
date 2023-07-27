<style>
    .home-intro .content h2 .color-highlight {
        color: <?=$config["corTitulosBanner"]?>;

    }

    

    h3.titleDireito {
        font-style: normal;
        font-weight: 700;
        font-size: 48px;
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

    #countdown h3.titleCentro{
        color: <?=$config["corTitulosBanner"]?>;
    }

    .boxPresenca{
        background: <?=$config["corPrincipal"]?> !important;
    }

    .bannerMensagens{
        background: <?=$config["corFundoMsg"]?>;
        height: auto !important;
    }

    

    footer {
        background: <?=$config["corPrincipal"]?>;
        padding: 0;
    }

    <?php
        if($config["corContadorTempo"] != ""){
            ?>
            /* #countdown li{
                background: <?=$config["corContadorTempo"]?> !important;
            } */
            
            <?php
        }
    ?>

   

    nav.navbar.navbar-expand-md.navbar-light {
        background: <?=$config["corPrincipal"]?>;
        padding: 0px;
    }

    div#portfolio {
    background: <?=$config["corPrincipal"]?>;
}

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

    

    p.descricaoMensagem {
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: <?=$config["corTextosBanner"]?>;
        padding: 0 140px;
    }
    .textoPadrao p{
        color: <?=$config["corTextosBanner"]?> !important;
    }

    .home-intro.bgBanner{
        background-color:<?=$config["corPrincipal"]?> !important;
    }

   

   
    </style>