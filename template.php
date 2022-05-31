<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?=($etat=='index')? " active":""?>"><i class="bi bi-globe"></i>
                PAYS_Data_Base</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?=($etat=='pays')? "active":""?>" href="pays.php">Pays</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?=($etat=='continent')? "active":""?>" href=""
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Continents
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="continent.php?region=Asia">Asie</a></li>
                            <li><a class="dropdown-item" href="continent.php?region=Oceania">Océanie</a></li>
                            <li><a class="dropdown-item" href="continent.php?region=Europe">Europe</a></li>
                            <li><a class="dropdown-item" href="continent.php?region=Americas">Amerique</a></li>
                            <li><a class="dropdown-item" href="continent.php?region=Africa">Afrique</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link <?=($etat=='cards')? "active":""?>" href="cards.php">Card</a>
                    </li>
                </ul>
                <form class=" d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <body>
        <?=$content?>
        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

</html>