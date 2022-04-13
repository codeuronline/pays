<?php

$pays = json_decode(file_get_contents("https://restcountries.com/v3.1/all"));
ob_start(); ?>
<br>
<div class="container-fluid">
    <div class="row">
        <?php $count= 0;
    foreach ($pays as $aPays) : ?>
        <div class="col">
            <div class="card" style="width:200px">
                <img class="card-img-top" src="<?=$aPays->flags->png?>" alt="Card image">
                <div class="card-body">
                    <center>
                        <h4 class="card-title"><?= $aPays->name->common ?></h4>
                    </center>
                    <p class="card-text">
                        <center>
                            <a href="<?=$aPays->maps->googleMaps?>"><i class="bi bi-pin"></i>
                            </a><?=number_format($aPays->population,0,'',' ')." habitants";?>
                        </center>
                    </p>
                </div>
            </div>
        </div>
        <?php $count++;?> <?php if($count<5) {
                        echo '<!--fin du col-->';
                     }else{
                    $count=0;
                    echo '<!--fin col--></div><div class="row">';}
                ?> <?php endforeach ?>
    </div>
    <!--div du container-->
    <?php
$content = ob_get_clean();
$etat="cards";
require_once("template.php"); ?>