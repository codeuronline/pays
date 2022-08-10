<?php 
//definition des constantes
define("PATH","save/");
define("URL","http://localhost/Projet%20(API%20Pays)/save/");
if (!file(PATH."geeks_data.json")){
    file_put_contents(PATH."geeks_data.json",(file_get_contents("https://restcountries.com/v3.1/all")));
}else{ 
    $content=json_decode(file_get_contents(URL."geeks_data.json"));
    var_dump(gettype($content));
}
ob_start();?>
<center>
    <br>
    <div class="container-fluid">
        <div class="card border-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">
                <h3>
                    Nombre de Pays
                </h3>
            </div>
            <div class="card-body" width="300px">
                <h5 class="card-title">Data Base de Pays</h5>
                <p class="card-text"><?=count($content)?></p>
            </div>
        </div>
    </div>
</center>
<?php 
$content=ob_get_clean();
$etat="index";
 require_once("template.php");?>