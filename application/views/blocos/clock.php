<?php if($cancelamento){ ?>
    <div class="mb-3">
        <h3 class="titleCentro"><?=$cancelamento["motivo"]?>
    </div>
    <?php
}else{ ?>
    <div id="countdown">
        <h3 class="titleCentro"><?=$config["textoContadoTempo"]?></h3>
        <ul class="countdown-clock d-flex justify-content-center mt-3">
            <li class="m-1 d-flex justify-content-center align-items-center flex-wrap">
                <span id="months" class="meses clock-time"></span>
                <span class="clock-label">meses</span>
            </li>
            <li class="m-1 d-flex justify-content-center align-items-center flex-wrap">
                <span id="days" class="dias clock-time"></span>
                <span class="clock-label">dias</span>
            </li>
            <li class="m-1 d-flex justify-content-center align-items-center flex-wrap">
                <span id="hours" class="horas clock-time"></span>
                <span class="clock-label">horas</span>
            </li>
            <li class="m-1 d-flex justify-content-center align-items-center flex-wrap">
                <span id="minutes" class="minutos clock-time"></span>
                <span class="clock-label">minutos</span>
            </li>
            <li class="m-1 d-flex justify-content-center align-items-center flex-wrap">
                <span id="seconds" class="segundos clock-time"></span>
                <span class="clock-label">segundos</span>
            </li>
        </ul>
    </div>
    <div id="countdown" class="emoji">
        <span>🥳</span>
        <span>🎉</span>
        <span>🎂</span>
    </div>
    <?php
}

?>