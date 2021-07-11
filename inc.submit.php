<?php

class Souveti {

    private $message;
   

    public function __construct($message) {
        $this->message = $message;
    }

    public function SubmitSouveti($message = null){
        echo " <h1>  {$this->message} </h1> ";
    }

    public function KolikSlovJeVeSouveti($message = null){
       $pocet_slov = (explode(" ",$this->message));
        //print_r($pocet_slov);
        $posledni_element_pole = end($pocet_slov);
        
        //řešení chyby, pokud někdo nechá za slovem mezeru "Auto "
        if(!empty($posledni_element_pole)){
            $pocet_slov_result = count($pocet_slov);   
        }
        else {
            $pocet_slov_result = count($pocet_slov);
            $pocet_slov_result = --$pocet_slov_result;
            $pocet_slov = --$pocet_slov;
        }
        

        if($pocet_slov_result == 1){
            echo "<br> <h2> Vami zvolené souvětí obsahuje <b> $pocet_slov_result </b> slovo. </h2> <br />"; 
        }
        elseif ($pocet_slov_result > 1 AND $pocet_slov_result < 5){
            echo "<br> <h2> Vami zvolené souvětí obsahuje <b> $pocet_slov_result </b> slova. </h2> <br />";
        }
        else {
            echo "<br> <h2> Vami zvolené souvětí obsahuje <b> $pocet_slov_result </b> slov. </h2> <br />";
        }      

        //správně skoloňování 
        foreach ($pocet_slov as $row) {
            $delka_slova = mb_strlen($row);

            //ostranění nadbytečného slova, pokud někdo nechá za slovem mezeru "Auto "
            if ($delka_slova === 0 ){
            }

            elseif($delka_slova == 1){
                echo "<br>  Délka slova <b> $row </b> je  $delka_slova  znak.<br />";
            }
            elseif ($delka_slova > 1 AND $delka_slova < 5){
            echo "<br>  Délka slova <b> $row </b> jsou  $delka_slova znaky. <br />";
            }
            else {
                echo "<br>  Délka slova <b> $row </b> je  $delka_slova znaků. <br />";
            }
        }    
    }

    const dekujeme = "<br /> <br /> © 2021";
}

function NevyplnenePolicko($alert) {
    
    echo "<script>
          alert('$alert');
          window.location.href='souveti.php';
          </script>";
    
}

//Kontrola, jestli bylo vyplněno políčko pro souvětí
if(!empty($_POST["name"])){

    //pokud ano, provést následující akce
    if(isset($_POST["submit"]))
    {
        $souveti = $_POST["name"];
        $result = new Souveti ($souveti);
        $result->SubmitSouveti();
        $result->KolikSlovJeVeSouveti();
        echo Souveti::dekujeme;
    }
}
//Pokud nikoliv, vyhodit alert a vrtátit zpět
else{
    NevyplnenePolicko("Prosím, nejprve vyplňte políčko pro souvětí."); 
}

?>