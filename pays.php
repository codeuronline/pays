<?php
if (!(@$pays)){
    $pays = json_decode(file_get_contents("https://restcountries.com/v3.1/all"));
}
if ($_GET && in_array($_GET["region"],$pays)) $pays = array_filter($pays);

ob_start(); ?>
<br>
<div class="container-fluid border-primary mb-3">
    <table class="table">
        <tr>
            <th>
                <form>
                    Nom
                    <button onclick=" tri(1,'pays')" type='submit'><i class="bi bi-caret-up-fill"></i></button>
                    <button onclick="tri(0,'pays')" type='submit'><i class="bi bi-caret-down-fill"></i></button>
                </form>
            </th>
            <th>
                <form>
                    Nom Officiel
                    <button onclick="tri(1,'pays')" type='submit'><i class="bi bi-caret-up-fill"></i></button>
                    <button onclick="tri(0,'pays')" type='submit'><i class="bi bi-caret-down-fill"></i></button>
                </form>
            </th>
            <th>Drapeau</th>
            <th>Symbole Monétaire</th>
            <th>
                <form>
                    Continent
                    <button onclick="tri(1,'continent')" type='submit'><i class="bi bi-caret-up-fill"></i></button>
                    <button onclick="tri(0,'continent')" type='submit'><i class="bi bi-caret-down-fill"></i></button>

                </form>
            </th>
        </tr>

        <?php error_log(print_r($pays, 1));
    foreach ($pays as $aPays) : ?>
        <tr>
            <td><?= $aPays->name->official ?></td>
            <td><?= $aPays->name->common ?></td>
            <td><img src="<?= $aPays->flags->png ?>" width="100px" alt=""></td>
            <td><?php if(isset($aPays->currencies)){foreach ($aPays->currencies as $money){
            
            if($money->symbol) echo $money->symbol."($money->name)";
        }}
        ?>
                <!-- </td> -->
                <?php //(isset($aPays->currencies->symbol))? var_dump($aPays->$currencies->symbol):"Monnaie non définie"?>
                <!-- </td> -->
            <td>
                <a href="continent.php?region=<?= $aPays->region ?>"><?= $aPays->region ?>
            </td>

        </tr>
        <?php endforeach ?>
    </table>
</div>
<?php
$content = ob_get_clean();
$etat="pays";
require_once("template.php"); ?>