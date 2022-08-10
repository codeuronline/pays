<?php
define("PATH","save/");
define("URL","http://localhost/Projet%20(API%20Pays)/save/");
if (!file(PATH."geeks_data.json")){
    $content=file_put_contents(PATH."geeks_data.json",(file_get_contents("https://restcountries.com/v3.1/all")));
}else{
    $content=file_get_contents((URL."geeks_data.json"));
}
if (!@($pays)){
    $pays = json_decode($content);
}
if ($_GET && in_array($_GET["region"],$pays)) $pays = array_filter($pays);
ob_start(); ?>
<table class="table">
    <tr>
        <th>
            <form onclick="tri(0,'continent');"><button type="submit">Nom</button></form>
        </th>
        <th>
            <form onclick="tri(1,'continent');">
                <button type="submit">Nom Oficiel</button>
            </form>
        </th>
        <th>Symbole Monétaire</th>
        <th>Drapeau</th>

        <th>
            <button type="submit">Continent </button>
        </th>
        <th>Position</th>
    </tr>

    <?php foreach ($pays as $aPays) : ?>
    <tr>
        <?php if ((isset($_GET['region'])) && ($_GET['region']==$aPays->region)) :?>
        <td><?= $aPays->name->official ?>
        </td>
        <td><?= $aPays->name->common ?></td>
        <td>
            <?php if (isset($aPays->currencies)):?>
            <?php foreach ($aPays->currencies as $money):?>
            <?php if(isset($money->symbol)) :?>
            <?=$money->symbol."($money->name)";?>
            <?php else :?>
            <?="Monnaie non renseignée"?>
            <?php endif;endforeach;endif?>
        </td>
        <td><img src="<?= $aPays->flags->png ?>" width="100px" alt="">
        </td>
        <td>
            <a href="continent.php?region=<?=$aPays->region ?>"><?= $aPays->region ?>
        </td>
        <td><a href="<?=$aPays->maps->googleMaps?>"><i class="bi bi-pin-map"></i></a>
        </td>
        <?php endif ?>

    </tr>
    <?php endforeach ?>
</table>

<?php
$content = ob_get_clean();
$etat="continent";
require_once("template.php"); ?>