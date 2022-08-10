<?php
$pays=  json_decode(file_get_contents("https://restcountries.com/v3.1/all"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php 

//var_dump($pays);
// array_multisort($arr1, array('name'=>SORT_DESC));
$region  = array_column($pays, 'region');
$official=array_column($pays,'official');
$common =array_column($pays,'common');

array_multisort($official,SORT_ASC,$pays);
echo "<br>";
foreach ($pays as $aPays) {
var_dump($aPays->name->common);
};
//array_multisort($pays->region,SORT_ASC,$pays);
// var_dump($arr2);


die;
?>

<body>
    <?php foreach ($pays as $aPays) : ?>
    <h2>
        <?= $aPays->region?>
    </h2>
    <br>
    <h2>
        <?= $aPays->name->common?>
    </h2>
    <h2>
        <?= $aPays->name->official?>
    </h2>
    <hr>
    <?php endforeach ?>
</body>

</html>