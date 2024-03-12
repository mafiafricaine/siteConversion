<?php
// session_start();
$title = "Yens";
$nav = "yens";
require "header2.php";
?>

<div class="structure">

<h1>Yens vs Euros</h1>

<?php

$exchange_rate=$_SESSION['exrates']['eur-yen'] ?? 0;
$selected_currency = $_POST['options'] ?? ''; 
$input_amount = $_POST['nombre1'] ?? 0;

if (isset($_POST['nombre1'])) 
{   
    echo "Another try?"; 

    // Determine the not selected currency
    $not_selected_currency = ($selected_currency === 'Yens') ? 'Euros' : 'Yens';

    // Dynamically retrieve the exchange rate based on the selected currency
    $dynamic_exchange_rate = ($selected_currency === 'Euros') ? number_format((1 / $exchange_rate), 4) : $exchange_rate ;

    // Calculate the result based on the selected currency
    // $_SESSION['result'] = $input_amount * $dynamic_exchange_rate; 
    // $result = number_format($_SESSION['result'], 3); // Format result to 1 decimals
    $result = number_format(($input_amount * $dynamic_exchange_rate), 3);
    
} else  {
        echo "Start";
        }
?>


<br><br><br>


<!-- FORM -->

    <div class="addition">
        <form action="/php/site_conversion/c_yen.php" method='POST'>
            <label for="options">Selling</label><br><br>
            <select id="options" name="options">
                <option value="Euros" id="eur">YENS</option> 
                <option value="Yens" id="yen">EUROS</option>
            </select>

            
            <input type="number" name="nombre1" placeholder="Amount" step="any">
            <button class="btn_calculus" type="submit"><img src="./images/equal.jpg" alt="" width=20px id="imgmath"></button>
        </form>
    </div>


<!-- END FORM -->

<!-- Display the result -->
<?php 
$rate=null;
if (isset($_POST['nombre1'])) {
  // $rate=number_format((1 / $exchange_rate), 4);
  $rate= ($selected_currency==='Yens') ? $exchange_rate : number_format((1 / $exchange_rate), 4);
  echo "<p>Result2: $input_amount $not_selected_currency at a rate of $rate = $result $selected_currency </p>"; 
}
?>


<!-- FOOTER -->
<?php
require "footer.php";
?>

</div>


