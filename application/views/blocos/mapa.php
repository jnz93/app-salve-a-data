<?php
$ufs = array(
"Acre"=>"AC",
"Alagoas"=>"AL",
"Amapá"=>"AP",
"Amazonas"=>"AM",
"Bahia"=>"BA",
"Ceará"=>"CE",
"Distrito Federal"=>"DF",
"Espírito Santo"=>"ES",
"Goiás"=>"GO",
"Maranhão"=>"MA",
"Mato Grosso"=>"MT",
"Mato Grosso Do Sul"=>"MS",
"Minas Gerais"=>"MG",
"Pará"=>"PA",
"Paraíba"=>"PB",
"Paraná"=>"PR",
"Pernambuco"=>"PE",
"Piauí"=>"PI",
"Rio De Janeiro"=>"RJ",
"Rio Grande Do Norte"=>"RN",
"Rio Grande Do Sul"=>"RS",
"Rondônia"=>"RO",
"Roraima"=>"RR",
"Santa Catarina"=>"SC",
"São Paulo"=>"SP",
"Sergipe"=>"SE",
"Tocantins"=>"TO"
);
?>
<div class="row" id="endereco">
        <div class="col-12 text-center">
       
        <p class="endereco" style="
    font-size: 20px;
    font-weight: bold;
">Local: <?=$endereco["nomeLocal"]?>. <?=$endereco["logradouro"]?>, <?=$endereco["numero"]?>, <?=ucfirst($endereco["bairro"])?>. <?=ucfirst($endereco["cidade"])?>/ <?=$ufs[ucwords($endereco["estado"])]?></p>
        </div>
</div>
<div id="mapa" class="portfolio section-bottom-only">

        <iframe width="100%" height="<?=(isset($height) ? $height : "350px")?>" id="gmap_canvas"
            src="https://maps.google.com/maps?q=<?=$endereco["logradouro"]?>,<?=$endereco["numero"]?>,<?=$endereco["bairro"]?>,<?=$endereco["cidade"]?>-<?=$endereco["estado"]?>?>&t=&z=13&ie=UTF8&iwloc=&output=embed"
            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

    </div>