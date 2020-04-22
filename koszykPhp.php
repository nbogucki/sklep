<?php

include 'LaczenieBaza.php';

$sql2="SELECT Model, Cena FROM koszyczek;";
        $wynik=[];
        if($kupione=mysqli_query($mysqli,$sql2)){            
            $rowcount=mysqli_num_rows($kupione);
                if($rowcount > 0) {
                    while($row=mysqli_fetch_assoc($kupione)) { 
                
                       $wynik[] = $row['Model'];
                       $wynik2[] = $row['Cena'];
                    } 
                  }
                  mysqli_free_result($kupione);
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



    $x=0;
    $_SESSION['model']='';
    $_SESSION['sztuki']='';
    $_SESSION['suma']=0;
    echo "<form method='POST'>";
echo "<form method='POST'><button name='clear'>Wyczyść Koszyk</button></form>";
if(isset($_SESSION['koszyk'])) {
    foreach ($_SESSION['koszyk'] as $key => $val) {
        $_SESSION['model'] .= $val['model'] . " , ";

        if (isset($_POST['clear'])) {

            unset($_SESSION['koszyk']);

        }
        echo "
            <tr>	   	
              <td>" . $val['model'] . "</td>
              <td><img src='" . $val['miniaturka'] . "' width='50px' height='50px'></td>
              <td><input type='number' oninput='cena" . $x . ".value = sztuki" . $x . ".value*" . $val['cena'] . "'  size='2' name='sztuki" . $x . "' id='sztuki" . $x . "'  pattern='^[1-9]{1,2}$' style='width:50px;' min='1' max='" . $val['sztuki'] . "' required> - " . $val['sztuki'] . "</td> 
              <td><output id='cena" . $x . "'>" . $val['cena'] . "</output></td>
              
            </tr>
            
            ";
        echo " <script >

	function myFunction(val) {
        
        document.getElementById('cena" . $x . "').innerHTML =  val;
    }
	

    </script>";

        if (isset($_POST["sztuki" . $x])) {
            if (isset($_SESSION['sztuki'])) {
                $_SESSION['sztuki'] .= $_POST["sztuki" . $x] . " , ";
                $_SESSION['suma'] = $_SESSION['suma'] + $_POST["sztuki" . $x] * $val['cena'];
            }
        }
        $x++;
        $_SESSION['licznik'] = $x;

    }
}
    echo "<p id='suma'></p>";


?>
