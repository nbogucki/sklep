<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<title>AleTelefon.pl</title>
	<meta charset="utf-8" />
	<meta name="description" content="Kontakt z administratorem strony AleTelefon.pl" />
	<meta name="keywords" content="Sklep, Internetowy, telefon, Nowa Sól, Iphone, Samsung, Huawei, Kożuchów, AleTelefon.pl">
	<link rel="stylesheet" href="szablonCSS.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="szablon.php" title="AleTelefon.pl"><img src="telefon.png" alt="AleTelefon.pl"></a>
            <a class="navbar-brand " href="koszyk.php" title="koszyk"><img src="pobrane.png" alt="koszyk">
                <span>W koszyku(<?php if(isset($_SESSION['licznik'])){ echo $_SESSION['licznik']; } ?>)</span></a>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="szablon.php" title="Strona Główna">Strona Główna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="Wszystkie Produkty" href="produkty.php">Produkty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" title="Kontakt z administratorem" href="kontakt.php">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if(isset($_SESSION['zalogowany'])) {
                            if ($_SESSION['zalogowany'] == 1) {

                                echo "<form method='post'><button class='nav-link btn-dark' title='Wyloguj' name='wyloguj' value='wyloguj'>Wyloguj</button></form>";
                                if(isset($_POST['wyloguj'])) {
                                    if ($_POST['wyloguj'] == 'wyloguj') {
                                        session_destroy();
                                        echo("<script>location.href = '/sklep/szablon.php';</script>");
                                    }
                                }
                            }
                        }
                        else {

                            echo "<a class='nav-link active' title='Zaloguj' href='zaloguj.php'>Zaloguj</a>";

                        }
                        ?>

                    </li>
                </ul>
            </div>
        </nav>
    </header>
        <arcticle class="text-center"><br><br><br><br>
            <?php

            if(isset($_SESSION['admin'])){
                if($_SESSION['admin']==1){
                    ?>
                <form method="POST">
                    <p>Dodawanie modelu do bazy danych i na strone!</p>
                    <span>Model: </span><input type="text" name="model" required><br><br>
                    <span>Producent: </span><input type="text" name="producent" required><br><br>
                    <span>Cena: </span><input type="number" name="cena" required><br><br>
                    <span>Ścieżka do zdjęcia: </span><input type="text" name="miniaturka" required><br><br>
                    <span>Ilość Sztuk: </span><input type="number" name="sztuki" required><br><br>
                    <button name="dodaj" value="dodaj">Wyślij</button>
                </form>
            <?php
                    if(isset($_POST['dodaj'])){
                        include 'LaczenieBaza.php';
                        $rezultat = "INSERT INTO koszyczek VALUES(NULL,'".$_POST['model']."','".$_POST['producent']."',
                        '".$_POST['cena']."','".$_POST['miniaturka']."','".$_POST['sztuki']."')";
                        mysqli_query($mysqli,$rezultat);
                    }
                }
            }
            else{
                echo "<p>E-mail: norbertBogucki@wp.pl</p>";
                echo "<p>Telefon: 99999999</p>";

            }
            ?>
        </arcticle>
    </body>
</html>