<?php
session_start();

?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <title>AleTelefon.pl</title>
    <meta charset="utf-8" />
    <meta name="description" content="Wszystkie produkty, telefony ze sklepu AleTelefon.pl" />
    <meta name="keywords" content="Sklep, Internetowy, telefon, Nowa Sól, Iphone, Samsung, Huawei, Kożuchów, AleTelefon.pl">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="szablonCSS.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
                    <a class="nav-link active" title="Wszystkie Produkty" href="produkty.php">Produkty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" title="Kontakt z administratorem" href="kontakt.php">Kontakt</a>
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
<article style="margin-top: 70px;">
    <div class="container-fluid">
        <div class="card-deck">
            <div class="card zdjecie zdjecie-s1" itemscope itemtype="http://schema.org/Product">
                <img class="card-img-top obraz " src="iphone.jpg" alt="Iphone X" title="Iphone X" >
                <div class="card-body text-center">
                    <h4 class="card-title" itemprop="model">Iphone X</h4>
                    <p itemprop="description">Najnowszy i najlepszy Iphone</p>
                    <p itemprop="manufacturer" itemscope itemtype="http://schema.org/Organization">
                        Nazwa producenta: <span itemprop="name"><strong>Apple</strong></span>
                    </p>
                    <p itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <span class="card-text alert alert-success" itemprop="price">4000zł</span><span class="alert alert-danger"><s>4199zł</s></span>
                    </p>
                    <form method="POST" action="koszyk.php"><button  title="kup Teraz Iphone X" class="btn btn-primary" name="Iphone">Kup Teraz</button></form>
                </div>
            </div>
            <div class="card zdjecie zdjecie-s1" itemscope itemtype="http://schema.org/Product">
                <img class="card-img-top obraz" src="samsung.jpg" alt="Samsung S9+" title="Samsung S9+">
                <div class="card-body text-center">
                    <h4 class="card-title" itemprop="model">Samsung S9+</h4>
                    <p itemprop="description">Najnowszy i najlepszy Samsung</p>
                    <p itemprop="manufacturer" itemscope itemtype="http://schema.org/Organization">
                        Nazwa producenta: <span itemprop="name"><strong>Samsung</strong></span>
                    </p>
                    <p itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <span class="card-text alert alert-success" itemprop="price">3900zł</span><span class="alert alert-danger"><s>3999zł</s></span>
                    </p>
                    <form method="POST" action="koszyk.php"><button title="kup Teraz Iphone Samsung 9+" class="btn btn-primary" name="Samsung">Kup Teraz</button></form>
                </div>
            </div>


            <div class="card zdjecie zdjecie-s1" itemscope itemtype="http://schema.org/Product">
                <img class="card-img-top obraz " src="huawei.jpg" alt="Huawei P20Pro" title="Huawei P20Pro">
                <div class="card-body text-center">
                    <h4 class="card-title" itemprop="model">Huawei P20Pro</h4>
                    <p itemprop="description">Najnowszy i najlepszy Huawei</p>
                    <p itemprop="manufacturer" itemscope itemtype="http://schema.org/Organization">
                        Nazwa producenta: <span itemprop="name"><strong>Huawei</strong></span>
                    </p>
                    <p itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <span class="card-text alert alert-success" itemprop="price">3000zł</span><span class="alert alert-danger"><s>3199zł</s></span>
                    </p>
                    <form method="POST" action="koszyk.php"><button title="kup Teraz Huawei P20Pro" class="btn btn-primary" name="Huawei">Kup Teraz</button></form>
                </div>
            </div>
            <div class="card zdjecie zdjecie-s1" itemscope itemtype="http://schema.org/Product">
                <img class="card-img-top obraz " src="SamsungS7.jpg" alt="Samsung S7" title="Samsung S7">
                <div class="card-body text-center">
                    <h4 class="card-title" itemprop="model">Samsung S7</h4>
                    <p itemprop="description">Elastyczny Samsung S7</p>
                    <p itemprop="manufacturer" itemscope itemtype="http://schema.org/Organization">
                        Nazwa producenta: <span itemprop="name"><strong>Samsung</strong></span>
                    </p>
                    <p itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <span class="card-text alert alert-success" itemprop="price">1400zł</span><span class="alert alert-danger"><s>1500zł</s></span>
                    </p>
                    <form method="POST" action="koszyk.php"><button title="kup Teraz Samsung S7" class="btn btn-primary" name="SamsungS7">Kup Teraz</button></form>
                </div>
            </div>

        </div>
    </div>
</article>
<article style="margin-top: 50px;">
    <div class="container-fluid">
        <div class="card-deck">
            <div class="card zdjecie zdjecie-s1" itemscope itemtype="http://schema.org/Product">
                <img class="card-img-top obraz " src="iphone5S.jpg" alt="Iphone5S" title="Iphone 5S">
                <div class="card-body text-center">
                    <h4 class="card-title" itemprop="model">Iphone 5S</h4>
                    <p itemprop="description">mocny Iphone 5S</p>
                    <p itemprop="manufacturer" itemscope itemtype="http://schema.org/Organization">
                        Nazwa producenta: <span itemprop="name"><strong>Iphone</strong></span>
                    </p>
                    <p itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <span class="card-text alert alert-success" itemprop="price">1500zł</span><span class="alert alert-danger"><s>1600zł</s></span>
                    </p>
                    <form method="POST" action="koszyk.php"><button title="kup Teraz Iphone 5S" class="btn btn-primary" name="Iphone5S">Kup Teraz</button></form>
                </div>
            </div>
            <div class="card zdjecie zdjecie-s1" itemscope itemtype="http://schema.org/Product">
                <img class="card-img-top obraz " src="huawei10.jpg" alt="Huawei10" title="Huawei 10">
                <div class="card-body text-center">
                    <h4 class="card-title" itemprop="model">Huawei 10</h4>
                    <p itemprop="description">Szybki Huawei 10</p>
                    <p itemprop="manufacturer" itemscope itemtype="http://schema.org/Organization">
                        Nazwa producenta: <span itemprop="name"><strong>Huawei</strong></span>
                    </p>
                    <p itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <span class="card-text alert alert-success" itemprop="price">1499zł</span><span class="alert alert-danger"><s>1599zł</s></span>
                    </p>
                    <form method="POST" action="koszyk.php"><button title="kup Teraz Huawei 10" class="btn btn-primary" name="Huawei10">Kup Teraz</button></form>
                </div>
            </div>
            <div class="card zdjecie zdjecie-s1" itemscope itemtype="http://schema.org/Product">
                <img class="card-img-top obraz " src="iphoneSE.jpg" alt="Iphone SE" title="Iphone SE">
                <div class="card-body text-center">
                    <h4 class="card-title" itemprop="model">Iphone SE</h4>
                    <p itemprop="description">Stabilny Iphone SE</p>
                    <p itemprop="manufacturer" itemscope itemtype="http://schema.org/Organization">
                        Nazwa producenta: <span itemprop="name"><strong>Iphone</strong></span>
                    </p>
                    <p itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <span class="card-text alert alert-success" itemprop="price">899zł</span><span class="alert alert-danger"><s>1000zł</s></span>
                    </p>
                    <form method="POST" action="koszyk.php"><button title="kup Teraz Iphone SE" class="btn btn-primary" name="IphoneSE">Kup Teraz</button></form>
                </div>
            </div>
        </div>
    </div>
</article>
<article style="margin-top: 50px;">
    <div class="container-fluid">
        <div class="card-deck">
            <div class="card zdjecie zdjecie-s1" itemscope itemtype="http://schema.org/Product">
                <img class="card-img-top obraz " src="huawei8.jpg" alt="Huawei 8" title="Huawei 8">
                <div class="card-body text-center">
                    <h4 class="card-title" itemprop="model">Huawei 8</h4>
                    <p itemprop="description">Świetny Huawei 8</p>
                    <p itemprop="manufacturer" itemscope itemtype="http://schema.org/Organization">
                        Nazwa producenta: <span itemprop="name"><strong>Huawei</strong></span>
                    </p>
                    <p itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <span class="card-text alert alert-success" itemprop="price">699zł</span><span class="alert alert-danger"><s>899zł</s></span>
                    </p>
                    <form method="POST" action="koszyk.php"><button title="kup Teraz Huawei 8" class="btn btn-primary" name="Huawei8">Kup Teraz</button></form>
                </div>
            </div>
            <div class="card zdjecie zdjecie-s1" itemscope itemtype="http://schema.org/Product">
                <img class="card-img-top obraz " src="SamsungS6.jpg" alt="Samsung S6" title="samsung S6">
                <div class="card-body text-center">
                    <h4 class="card-title" itemprop="model">Samsung S6</h4>
                    <p itemprop="description">Niesamowity Samsung S6</p>
                    <p itemprop="manufacturer" itemscope itemtype="http://schema.org/Organization">
                        Nazwa producenta: <span itemprop="name"><strong>Samsung</strong></span>
                    </p>
                    <p itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <span class="card-text alert alert-success" itemprop="price">599zł</span><span class="alert alert-danger"><s>699zł</s></span>
                    </p>
                    <form method="POST" action="koszyk.php"><button title="kup Teraz Samsung S6" class="btn btn-primary" name="SamsungS6">Kup Teraz</button></form>
                </div>
            </div>
            <div class="card zdjecie zdjecie-s1" itemscope itemtype="http://schema.org/Product">
                <img class="card-img-top obraz " src="SamsungA5.jpg" alt="Samsung A5" title="Samsung A5">
                <div class="card-body text-center">
                    <h4 class="card-title" itemprop="model">Samsung A5</h4>
                    <p itemprop="description">Kosmiczny  Samsung A5</p>
                    <p itemprop="manufacturer" itemscope itemtype="http://schema.org/Organization">
                        Nazwa producenta: <span itemprop="name"><strong>Samsung</strong></span>
                    </p>
                    <p itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        <span class="card-text alert alert-success" itemprop="price">800zł</span><span class="alert alert-danger"><s>859zł</s></span>
                    </p>
                    <form method="POST" action="koszyk.php"><button title="kup Teraz Samsung A5" class="btn btn-primary" name="SamsungA5">Kup Teraz</button></form>
                </div>
            </div>
        </div>
    </div>
    </arcticle>
</body>
</html>