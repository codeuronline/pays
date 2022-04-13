<?php
$pays = json_decode(file_get_contents("https://restcountries.com/v3.1/all"));
if ($_GET && in_array($_GET["region"],$pays)) $pays = array_filter($pays);
ob_start(); ?>
<table class="table">
    <tr>
        <th>Nom</th>
        <th>Nom Officiel</th>
        <th>Drapeau</th>
        <th>Monnaie</th>
        <th>Continent</th>
    </tr>

    <?php error_log(print_r($pays, 1));
    foreach ($pays as $aPays) : ?>
    <tr>
        <td><?= $aPays->name->official ?></td>
        <td><?= $aPays->name->common ?></td>
        <td><img src="<?= $aPays->flags->png ?>" width="100px" alt=""></td>
        <td><?=var_dump($aPays->currencies)?></td>
        <td>
            <a href="continent.php?region=<?= $aPays->region ?>"><?= $aPays->region ?>
        </td>

    </tr>
    <?php endforeach ?>
</table>

<?php
$content = ob_get_clean();
require_once("template.php"); ?>