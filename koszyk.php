<?php
session_start()
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
	<title>AleTelefon.pl</title>
	<meta charset="utf-8" />
	<meta name="description" content="Wszystkie produkty, telefony ze sklepu AleTelefon.pl" />
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
				      <a class="nav-link" title="Kontakt z administratorem" href="kontakt.php">Kontakt</a>
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
                          else{

                              echo "<a class='nav-link active' title='Zaloguj' href='zaloguj.php'>Zaloguj</a>";

                          }
                          ?>

                      </li>
				  </ul>
				</div>
			</nav>
		</header>
        <?php
        if($_SESSION['zalogowany']==1){

        ?>
        <article style="margin-top: 60px;">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Model</th>
                    <th scope="col">Miniaturka</th>
                    <th scope="col">szt.</th>
                    <th scope="col">Cena</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include 'koszykPhp.php';

                ?>
                </tbody>

            </table>
            <section class="text-center">

                <br>
                <br>
                <span>Imię: </span><input type="text" name="imie" placeholder="Wpisz swoje imię" required><br><br>
                <span>Nazwisko: </span><input type="text" name="nazwisko" placeholder="Wpisz swoje nazwisko" required><br><br>
                <span>E-mail: </span><input type="email" name="email" placeholder="Wpisz swój email" required
                                            pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"><br><br>
                <span>Telefon: </span><input type="tel" name="telefon"  required maxlength="9" size="9"><br><br>
                <span>Miejscowość: </span><input type="text" name="miejscowosc" required placeholder="Wpisz Miejscowość"><br><br>
                <span>Ulica: </span><input type="text" name="ulica" placeholder="Podaj ulicę" required><br><br>
                <span>Kod pocztowy: </span><input type="text" name="kod" required><br><br>
                <span>Poczta: </span><input type="text" name="poczta" placeholder="Miejscowość poczty" required><br><br>
                <span>Płatność: </span><br><input type="radio" name="gender" value="przelew" checked>Przelew<br>
                <input type="radio" name="gender" value="ZaPobraniem" >Za Pobraniem<br><br>
                <span>Dostawa: </span><br><input type="radio" name="gender2" value="Kurier" checked>Kurier<br>
                <input type="radio" name="gender2" value="Poczta" >Poczta Polska<br><br>
                <button name="zamow" value="zamow">Zamów</button><br><br>
            </section>
            </form>

            <?php

                if (isset($_POST['clear'])) {
                    $_SESSION['licznik'] = 0;

                }
            }
            else{
                echo "<section class='text-center'><br><br>";
                echo "<a href='zaloguj.php'><button>Nie masz konta! Zaloguj się aby korzystać z koszyka!</button></a>";
                echo "</section>";
            }
            if(isset($_POST['zamow'])) {
                if ($_POST['zamow'] == 'zamow') {
                    include 'LaczenieBaza.php';

                        $resultat = "INSERT INTO zamowienia VALUES (NULL,'" . $_SESSION['model'] . "','" . $_SESSION['sztuki'] . "', '" . $_POST['imie'] . "',
                '" . $_POST['nazwisko'] . "','" . $_POST['email'] . "','" . $_POST['telefon'] . "','" . $_POST['miejscowosc'] . "',
                '" . $_POST['ulica'] . "','" . $_POST['kod'] . "','" . $_POST['poczta'] . "','" . $_POST['gender'] . "','" . $_POST['gender2'] . "','".$_SESSION['suma']."');";
                        mysqli_query($mysqli, $resultat);

                }
            }


			?>
		</article>
	</body>
</html>
