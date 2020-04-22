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
	<article style="margin-top: 70px;">
        <div class='container-fluid'>
            <div class='card-deck'>
        <?php
		include 'LaczenieBaza.php';
       function dodaj($item,$id)
       {
           $_SESSION['koszyk'][$id] = $item;
       }
        $sql2="SELECT * FROM koszyczek;";
        $wynik=[];
        $wynik2=[];
        $wynik3=[];
        $wynik4=[];
        $wynik5=[];
        if($haslo=mysqli_query($mysqli,$sql2)){
                $rowcount=mysqli_num_rows($haslo);
                if($rowcount > 0) {
                    while($row=mysqli_fetch_assoc($haslo)) {

                        $wynik[] = $row['Model'];
                        $wynik2[] = $row['Producent'];
                        $wynik3[] = $row['Cena'];
                        $wynik4[] = $row['Miniaturka'];
                        $wynik5[] = $row['Sztuk'];
                    }
                }
                mysqli_free_result($haslo);

        }
        for($i=0;$i<count($wynik);$i++) {
            $przekresl=$wynik3[$i]+199;
            echo " 
			
				<div class='card zdjecie zdjecie-s1' itemscope itemtype='http://schema.org/Product'>
					   	 <img class='card-img-top obraz ' src='".$wynik4[$i]."' alt='".$wynik[$i]."' title='".$wynik[$i]."' >
							<div class='card-body text-center'>
						      <h4 class='card-title' itemprop='model'>".$wynik[$i]."</h4>
						      <p itemprop='description'>Świetny ".$wynik[$i]."</p>
						      <p itemprop='manufacturer' itemscope itemtype='http://schema.org/Organization'>
							      Nazwa producenta: <span itemprop='name'><strong>".$wynik2[$i]."</strong></span>
							  </p>
						      <p itemprop='offers' itemscope itemtype='http://schema.org/Offer'>
						      	<span class='card-text alert alert-success' itemprop='price'>".$wynik3[$i]."</span><span class='alert alert-danger'><s>".$przekresl."</s></span>
						  	  </p>
						      <form method='POST'><button  title='kup Teraz ".$wynik[$i]."' class='btn btn-primary' name='przycisk".$i."'>Kup Teraz</button></form>
					 		</div>
	  					</div>";
            if(isset($_POST['przycisk'.$i])){
                $item = array('id'=>$i, 'model'=>$wynik[$i], 'miniaturka'=>$wynik4[$i],'cena'=>$wynik3[$i],'sztuki'=>$wynik5[$i] );
                dodaj($item,$i);


                echo("<script>location.href = '/sklep/koszyk.php';</script>");
            }
                if($i==3){
                    echo "</div></div></arcticle><arcticle><div class='container-fluid'>
                        <div class='card-deck'>
                        ";
                }
            if($i==7){
                echo "</div></div></arcticle><arcticle><div class='container-fluid'>
                        <div class='card-deck'>
                        ";
            }
        }
        ?>

            </div>
        </div>
	</article>
	</body>
</html>