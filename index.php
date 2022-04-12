<?php 
$content=json_decode(file_get_contents("https://restcountries.com/v3.1/all"));
ob_start();?>
<h1>
    Bienvenue sur un site qui liste les pays
</h1>

<?php 
$content=ob_get_clean();
 require_once("template.php");?>