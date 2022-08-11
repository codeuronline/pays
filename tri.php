<?php
//$pays = array_filter(json_decode(file_get_contents("https://restcountries.com/v3.1/all")));
extract($_GET);
error_log("GET ELEMENT".print_r($_GET, 1));
switch ($etat) {
    case "continent":
        switch ($id) {
            case 0:
                $region = array_column($pays,"region");
                var_dump(array_multisort($region,SORT_DESC,$pays));
                break;
            case 1:
                $region = array_column($pays,"region");
                var_dump(array_multisort($region,SORT_ASC,$pays));
                break;
        }
    case "pays":
        switch ($id) {
            case 0:
                $pays_state=array_column($pays,'name');
                var_dump(array_multisort($pays_state,SORT_DESC,$pays));
                //array_multisort($pays, array('name' => SORT_ASC));
                break;
            case 1:
                $pays_state=array_column($pays,'name');
                var_dump( array_multisort($pays_state,SORT_ASC,$pays));
                
                //array_multisort($pays, array('name' => SORT_DESC));
        break;

    }
}
//  $pays =array_multisort($pays,SORT_ASC);*/

$retour_value = json_encode($pays);
if ($etat== "pays"){
    header("Location: pays.php");
}else{
    header("Location: continent.php?region=all");
}
?>