<?php
$pays = array_filter(json_decode(file_get_contents("https://restcountries.com/v3.1/all")));
extract($_GET);
switch ($id) {
    case 0:
        $pays=array_multisort($pays,SORT_ASC);
        break;
    
    default:
        $pays=array_multisort($pays,SORT_DESC);
        break;
}
// $pays =array_multisort($pays,SORT_ASC);

$retour_value = json_encode($pays);
header("Location: pays.php");
?>