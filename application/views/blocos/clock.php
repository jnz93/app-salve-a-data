<?php
if($cancelamento){
    ?>
<h3 class="titleCentro"><?=$cancelamento["motivo"]?>
    <?php
}else{
?>
<div id="countdown">
<h3 class="titleCentro"><?=$config["textoContadoTempo"]?>
</h3>
    <ul>
        <li><span id="months" class="meses"></span>meses</li>
        <li><span id="days" class="dias"></span>dias</li>
        <li><span id="hours" class="horas"></span>horas</li>
        <li><span id="minutes" class="minutos"></span>minutos</li>
        <li><span id="seconds" class="segundos"></span>segundos</li>
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