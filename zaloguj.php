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
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
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
                    <a class="nav-link " title="Kontakt z administratorem" href="kontakt.php">Kontakt</a>
                </li>
                <li class="nav-item">
                    <?php
                    if(isset($_SESSION['zalogowany'])) {
                        if ($_SESSION['zalogowany'] == 1) {

                            echo "<form method='post'><button class='nav-link active' title='Wyloguj' name='wyloguj' value='wyloguj'>Wyloguj</button></form>";
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
    <arcticle class="text-center">
        <h1>Logowanie</h1>
        <form method="POST" >
            <br><br><span>Login: </span><input type="text" name="login" placeholder="Wpisz swój Login" required><br><br>
            <span>Hasło: </span><input type="password" name="haslo" placeholder="Wpisz swoje Hasło" required><br><br>
            <button name="zaloguj" value="zaloguj">Zaloguj</button><br><br>
            <a href="zarejestruj.php" title="rejestracja">Nie posiadasz konta? Zarejestruj się!</a>
        </form>
    </arcticle>
</body>
</html>
<?php
include 'LaczenieBaza.php';
if(isset($_POST['login'])){
    if($_POST['zaloguj']='zaloguj'){
        $sql="SELECT Login FROM uzytkownicy WHERE Login = '".$_POST['login']."';";
        if(mysqli_num_rows(mysqli_query($mysqli,$sql))){
            $sql2="SELECT Haslo FROM uzytkownicy WHERE Haslo = '".$_POST['haslo']."';";
            $wynik=[];
            if($haslo=mysqli_query($mysqli,$sql2)){
                {
                    $rowcount=mysqli_num_rows($haslo);
                    if($rowcount > 0) {
                        while($row=mysqli_fetch_assoc($haslo)) {

                            $wynik[] = $row['Haslo'];
                        }
                    }
                    mysqli_free_result($haslo);
                }
            }
            if($_POST['haslo']==$wynik[0]){
                $_SESSION['zalogowany']=1;
                if($_POST['login']=='admin'){
                    $_SESSION['admin']=1;
                }
                echo("<script>location.href = '/sklep/szablon.php';</script>");

            }
            else{
                echo 'Podałeś złe Hasło lub login';
            }

        }
        else{
            echo 'Podałeś złe Hasło lub login';
        }
    }
}






?>