<?php
$pays = json_decode(file_get_contents("https://restcountries.com/v3.1/all"));
if ($_GET && in_array($_GET["region"],$pays)) $pays = array_filter($pays);
ob_start(); ?>
<table class="table">
    <tr>
        <th>Nom</th>
        <th>Nom Officiel</th>
        <th>Monnaie</th>
        <th>Drapeau</th>
        <th>Continent</th>
        <th>Position</th>
    </tr>

    <?php foreach ($pays as $aPays) : ?>
    <tr>
        <?php if ((isset($_GET['region'])) && ($_GET['region']==$aPays->region)) :?>
        <td><?= $aPays->name->official ?>
        </td>
        <td><?= $aPays->name->common ?></td>
        <td>
            <?php if (isset($aPays->currencies)){foreach ($aPays->currencies as $money){
            if($money->symbol) echo $money->symbol."($money->name)";
        }}
        ?>
        </td>
        <td><img src="<?= $aPays->flags->png ?>" width="100px" alt=""></td>
        <td>
            <a href="continent.php?region=<?=$aPays->region ?>"><?= $aPays->region ?>
        </td>
        <td><i class="bi bi-pin-map"><a href="<?=$aPays->maps->googleMaps?>">&nbsp;&nbsp;</a></i>
        </td>
        <?php endif ?>

    </tr>
    <?php endforeach ?>
</table>

<?php
$content = ob_get_clean();
$etat="continent";
require_once("template.php"); ?>