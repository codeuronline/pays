<?php
$pays = json_decode(file_get_contents("https://restcountries.com/v3.1/all"));
if ($_GET && in_array($_GET["region"],$pays)) $pays = array_filter($pays);
ob_start(); ?>
<table class="table">
    <tr>
        <th>
            <form onclick="tri();"><button type="submit">Nom</button></form>
        </th>
        <th>
            <form onclick="tri();">
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
            <?php if($money->symbol) :?>
            <?=$money->symbol."($money->name)";?>
            <?php endif;endforeach;endif?>
        </td>
        <td><img src=" <?= $aPays->flags->png ?>" width="100px" alt="">
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