<?php 
$content=json_decode(file_get_contents("https://restcountries.com/v3.1/all"));
ob_start();?>
<center>
    <br>
    <div class="container-fluid">
        <div class="card border-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">
                <h3>
                    Bienvenue sur le site manipulant un JSON
                </h3>
            </div>
            <div class="card-body" width="300px">
                <h5 class="card-title">Nombre de Pays</h5>
                <p class="card-text"><?=count($content)?></p>
            </div>
        </div>
    </div>
    <?php 
$content=ob_get_clean();
$etat="index";
 require_once("template.php");?>