<?php
define("PATH","save/");
define("URL","http://localhost/Projet%20(API%20Pays)/save/");
if (!file(PATH."geeks_data.json")){
    echo "distant";
    $pays=file_put_contents(PATH."geeks_data.json",(file_get_contents("https://restcountries.com/v3.1/all")));
} 
    echo "local";
    $pays=json_decode(file_get_contents(URL."geeks_data.json"));

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

function common($a, $b) 
{
   global $pays;

   $pos1=array_search ($a->name->common, $pays);
   $pos2=array_search ($b->name->common, $pays);

   if ($pos1==$pos2)
       return 0;
   else
      return ($pos1 < $pos2 ? -1 : 1);

}
function official($a, $b) 
{
   global $pays;

   $pos1=array_search ($a->name->official, $pays);
   $pos2=array_search ($b->name->official, $pays);

   if ($pos1==$pos2)
       return 0;
   else
      return ($pos1 < $pos2 ? -1 : 1);

}
function region($a, $b) 
{
   global $pays;

   $pos1=array_search ($a->region, $pays,$strict=true);
   $pos2=array_search ($b->region, $pays);

   if ($pos1==$pos2)
       return 0;
   else
      return ($pos1 < $pos2 ? -1 : 1);
}
usort($pays,'region');
$continent=$pays;
sort($continent,SORT_DESC);

//$continent=$pays;
//$official= $pays;
//$common=$pays;

// tri par continent

// tri par nom
// array_multisort($official,SORT_ASC,$pays);


//array_multisort($pays->region,SORT_ASC,$pays);
// var_dump($arr2);


?>

<body>
    <?php echo "continent";
    foreach ($continent as $aPays) : ?> <h6>
        <?= $aPays->region?>||<?= $aPays->name->common?>||<?= $aPays->name->official?>
    </h6>
    <?php endforeach ?>
    <hr>

</body>

</html>