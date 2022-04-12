<?php

$pays = json_decode(file_get_contents("https://restcountries.com/v3.1/all"));
if ($_GET) $pays = array_filter($pays, in_array($_GET["region"], $pays));
ob_start(); ?>
<table class="table">
    <tr>
        <th>Nom</th>
        <th>Nom Officiel</th>
        <th>Drapeau</th>
        <th>Continent</th>
    </tr>

    <?php foreach ($pays as $aPays) : ?>
    <tr>
        <td><?= $aPays->name->official ?></td>
        <td><?= $aPays->name->common ?></td>
        <td><img src="<?= $aPays->flags->png ?>" width="100px" alt=""></td>
        <td>
            <a href="pays.php?region=<?= $aPays->region ?>"><?= $aPays->region ?>
        </td>

    </tr>
    <?php endforeach ?>
</table>

<?php
$content = ob_get_clean();
require_once("template.php"); ?>