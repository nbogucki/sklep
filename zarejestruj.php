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
                    <a class="nav-link active" title="Zaloguj" href="zaloguj.php">Zaloguj</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<arcticle class="text-center">
    <h1>Rejestracja</h1>
    <form method="POST" >
        <br><br><span>Login: </span><input type="text" name="login" placeholder="Wpisz swój Login" required><br><br>
        <span>Hasło: </span><input type="password" name="haslo" placeholder="Wpisz swoje Hasło" required><br><br>
        <span>E-mail: </span><input type="email" name="email" placeholder="Wpisz swój email" required
                                    pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"><br><br>
        <button name="zarejestruj" value="zarejestruj">Zarejestruj się</button><br><br>

    </form>
</arcticle>
</body>
</html>
<?php
include 'LaczenieBaza.php';
$sql2="SELECT * FROM uzytkownicy";
$wynik2 = array();
if ($result=mysqli_query($mysqli,$sql2))
{
    // Return the number of rows in result set
    $rowcount=mysqli_num_rows($result);
    // Free result set
    if($rowcount > 0) {
        while($row=mysqli_fetch_assoc($result)) {

            $wynik2[] = $row['Login'];
        }


    }
    mysqli_free_result($result);
}
if(isset($_POST['login'])){
    if($_POST['zarejestruj']=='zarejestruj'){
        $haslo=$_POST['haslo'];
        $sql="SELECT Login FROM uzytkownicy WHERE Login = '".$_POST['login']."';";
        if(mysqli_num_rows(mysqli_query($mysqli,$sql)) == 0 ){
            $wyrazenie = '/^[a-zA-Z0-9\.\-_]{2,10}$/D';
            if(preg_match($wyrazenie, $_POST['login'])){
                $haselo='/^[a-zA-Z0-9]{6,24}$/i';
                if(preg_match($haselo, $_POST['haslo'])){
                    $resultat = "INSERT INTO uzytkownicy VALUES (NULL,'".$_POST['login']."','".$haslo."', '".$_POST['mail']."')";
                    mysqli_query($mysqli, $resultat);
                    echo("<script>location.href = '/sklep/zaloguj.php';</script>");
                    echo 'Udało Ci się utworzyć użytkownika';
                }
                else{
                    echo "Twoje hasło musi zawierać minimum 6 znaków! litery albo 
                cyfry.";
                }
            }
            else{
                echo "Twój nick może zawierać tylko litery a-z i cyfry, a także 2-10 znaków";
            }
        }

        else{
            echo 'Użytkownik z takim loginem już istnieje!';

        }
    }
}
?>