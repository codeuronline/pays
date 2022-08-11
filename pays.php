<?php
define("PATH","save/");
define("URL","http://localhost/Projet%20(API%20Pays)/save/");
if (!file(PATH."geeks_data.json")){
    $content=file_put_contents(PATH."geeks_data.json",(file_get_contents("https://restcountries.com/v3.1/all")));
} else {
    $content=file_get_contents(URL."geeks_data.json");
}
if (!@($pays)){
    $pays = json_decode($content);
}
if ($_GET && in_array($_GET["region"],$pays)) $pays = array_filter($pays);
var_dump($_SERVER['REQUEST_METHOD']);
if (@$_GET){
    extract($_GET);
    error_log("GET ELEMENT".print_r($_GET, 1));
    switch ($etat) {
            case "continent":
        switch ($id) {
            case 0:
                $region = array_column($pays,"region");
                array_multisort($region,SORT_DESC,$pays);
                $pays=$region;
                break;
            case 1:
                $region = array_column($pays,"region");
                array_multisort($region,SORT_ASC,$pays);
                $pays =$region;
                break;
        }
        case "pays":
        switch ($id) {
            case 0:
                $pays_state=array_column($pays,'name');
                var_dump(array_multisort($pays_state,SORT_DESC,$pays));
                $pays=$pays_state;
                break;
            case 1:
                $pays_state=array_column($pays,'name');
                var_dump( array_multisort($pays_state,SORT_ASC,$pays));
                $pays=$pays_state;
                
        break;

    }
}
    var_dump(@$_POST,@$_GET);}


ob_start(); ?>
<br>
<!-- <script>
function tri(value, etat) {
    if (value == 1 || value == 0) console.log(value, etat);
    var file = 'http://localhost/Projet%20(API%20Pays)/save/geeks_data.json'; //var
    //var url = 'http://localhost/Projet%20(API%20Pays)/save/geeks_data.json?etat=' + etat + '&=id=' + value;

    function
    classerSelonPositionDes(a, b) {
        return a.position < b.position;
    }

    function classerSelonPositionAsc(a, b) {
        return
        a.position >
            b.position;
    }

    alert(file);
    fetch(file)
        .then(function(response) {
            let objetJson = response.json();
            console.log("response", objetJson);
            de
            if (value == 1)
                return response = objetJson.sort(classerSelonPositionDes()).json();
            if (value == 0)
                return response = objetJson.sort(classerSelonPositionAsc()).json();
        })
        .catch(function(error) {
            console.log("erreur")
            console.log(error)
        });
}
</script> -->
<div class="container-fluid border-primary mb-3">
    <table class="table">
        <tr>
            <th>
                <form>
                    Nom <button formaction="pays.php?value=0&etat=continent"><i class="bi bi-caret-up-fill">
                        </i>
                    </button>
                    <button formaction="pays.php?value=1&etat=continent" type='submit'>
                        <i class="bi bi-caret-down-fill">
                        </i>
                    </button>
                </form>
            </th>
            <th>
                <form>
                    Nom Officiel
                    <button formaction="pays.php?value=0&etat=pays" type='submit'>
                        <i class="bi bi-caret-up-fill">
                        </i></button>
                    <button formaction="pays.php?value=1&etat=pays" type='submit'>
                        <i class="bi bi-caret-down-fill">
                        </i>
                    </button>
                </form>
            </th>
            <th> Drapeau
            </th>
            <th> Symbole
                Monétaire
            </th>
            <th>
                <form>
                    Continent
                    <button onclick="tri(1,'continent')" type='submit'>
                        <i class="bi bi-caret-up-fill">
                        </i>
                    </button>
                    <button onclick="tri(0,'continent')" type='submit'>
                        <i class="bi bi-caret-down-fill">
                        </i>
                    </button>

                </form>
            </th>
        </tr>
        <?php error_log(print_r($pays, 1));
    foreach ($pays as $aPays) : ?>
        <tr>
            <td>
                <?= $aPays->name->official ?>
            </td>
            <td>
                <?= $aPays->name->common ?>
            </td>
            <td>
                <img src="<?= $aPays->flags->png ?>" width="100px" alt="">
            </td>
            <td> <?php if(isset($aPays->currencies)){foreach ($aPays->currencies as $money){
            if($money->symbol) echo $money->symbol."($money->name)";
        }}
        ?>
                <!-- </td> -->
                <?php //(isset($aPays->currencies->symbol))? var_dump($aPays->$currencies->symbol):"Monnaie non définie"?>
                <!-- </td>
                    -->
            <td>
                <a href="continent.php?region=<?=$aPays->region ?>">
                    <?= $aPays->region ?>
                </a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</div>
<?php
$content = ob_get_clean();
$etat="pays";
require_once("template.php"); ?>