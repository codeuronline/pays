<?php
$pays = json_decode(file_get_contents("https://restcountries.com/v3.1/all"));
// if ($_GET && in_array($_GET["region"],$pays)) $pays = array_filter($pays);
ob_start(); ?>

<div class="container-fluid">
    <div class="row">
        <?php $count= 0;
    echo $count;
    foreach ($pays as $aPays) : ?>

        <div class="col">
            <div class="card" style="width:150px">
                <img class="card-img-top" src="<?=$aPays->flags->png?>" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title"><?= $aPays->name->official ?></h4>
                    <p class="card-text"><?= $aPays->name->common ?></p>
                </div>
            </div>
        </div>
        <?php $count++;
            echo $count;?>

        <?php if($count<5) {
                        echo '<!--fin du col-->';
                     }else{
                    $count=0;
                    echo '<!--fin col-->
    </div><!--fin row-->
    <!--nouvelle row-->
                        <div class="row">';}
                ?> <?php endforeach ?>
    </div>
    <!--div du container-->
    <?php
$content = ob_get_clean();
require_once("template.php"); ?>