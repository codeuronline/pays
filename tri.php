<?php
//$pays = array_filter(json_decode(file_get_contents("https://restcountries.com/v3.1/all")));
extract($_GET);
error_log("GET ELEMENT".print_r($_GET, 1));
switch ($id) {
    case 0:
        array_multisort($pays, array('name'=>SORT_DESC));
        break;
    case 1:
        array_multisort($pays,array('name'=>SORT_DESC));
        break;
}
//  $pays =array_multisort($pays,SORT_ASC);*/

$retour_value = json_encode($pays);
header("Location: pays.php");
?>