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

$arr1 = array(
    array('id'=>1,'name'=>'aA','cat'=>'cc'),
    array('id'=>2,'name'=>'aa','cat'=>'dd'),
    array('id'=>3,'name'=>'bb','cat'=>'cc'),
    array('id'=>4,'name'=>'bb','cat'=>'dd')
);
var_dump($pays);
// array_multisort($arr1, array('name'=>SORT_DESC));
array_multisort($pays->region,SORT_ASC,$pays);
echo "<br>";
var_dump($pays);

// var_dump($arr2);
die;
array_multisort($pays, array("region"=>SORT_DESC));?>

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