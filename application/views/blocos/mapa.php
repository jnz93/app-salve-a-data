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
<div class="row mb-4">
    <div class="col-12 text-center">
        <div class="d-flex flex-wrap align-items-center justify-content-center mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#3B3E44" class="bi bi-geo-alt-fill me-3" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
            </svg>
            <h3 class="titleCentro w-100 m-0" style="margin: 0 !important;">Localização</h3>
        </div>
        <p class="endereco"><?=$endereco["nomeLocal"]?>. <?=$endereco["logradouro"]?>, <?=$endereco["numero"]?>, <?=ucfirst($endereco["bairro"])?>. <?=ucfirst($endereco["cidade"])?>/ <?=$ufs[ucwords($endereco["estado"])]?></p>
    </div>
</div>
<div id="mapa" class="">
    <iframe width="100%" height="<?=(isset($height) ? $height : "350px")?>" id="gmap_canvas" src="https://maps.google.com/maps?q=<?=$endereco["logradouro"]?>,<?=$endereco["numero"]?>,<?=$endereco["bairro"]?>,<?=$endereco["cidade"]?>-<?=$endereco["estado"]?>?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
    </iframe>
</div>