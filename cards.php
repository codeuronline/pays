<?php
$pays = json_decode(file_get_contents("https://restcountries.com/v3.1/all"));
// if ($_GET && in_array($_GET["region"],$pays)) $pays = array_filter($pays);
ob_start(); ?>

<div class="container-fluid">
    <?php $count= count($pays);
    echo $count;
    foreach ($pays as $aPays) : ?>
    <div class="row">
        <div class="col">
            <div class="card" style="width:250px">
                <img class="card-img-top" src="<?=$aPays->flags->png?>" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title"><?= $aPays->name->official ?></h4>
                    <p class="card-text"><?= $aPays->name->common ?></p>
                </div>
            </div>

            <?php $count++;
            echo $count;?>
        </div>
        <?php if($count<7) {
                        echo '<!--fin du col-->';
                     }else{
                    $count=0;
                        echo '<!--fin col-->
                            </div><!--fin row-->
                        <!--nouvelle row-->
                        <div class="row">
                            <div class="col">';}
                ?> <?php endforeach ?>
    </div>
    <!--div du container-->
    <?php
$content = ob_get_clean();
require_once("template.php"); ?>