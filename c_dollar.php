<?php
session_start();
$title = "Dollars";
$nav = "dollars";
require "header2.php";
// if (!is_connected()) {
//   header("Location: /php/site_conversion/login.php"); 
//   exit(); 
// }

?>

<div class="structure">

<h1>American Dollars vs Euros</h1>

<?php

// $exchange_rate=$_SESSION['eur-dol'] ?? 0; CHANGED
$exchange_rate=$_SESSION['exrates']['eur-dol'] ?? 0;
$selected_currency = $_POST['options'] ?? 'Euros'; 
$input_amount = $_POST['nombre1'] ?? 0;

if (isset($_POST['nombre1'])) 
{   
    echo "Another try?"; 

    // Determine the not selected currency
    $not_selected_currency = ($selected_currency === 'Euros') ? 'Dollars' : 'Euros';

    // Dynamically retrieve the exchange rate based on the selected currency
    $dynamic_exchange_rate = ($selected_currency === 'Euros') ? number_format((1 / $exchange_rate), 4) : $exchange_rate ;

    // Calculate the result based on the selected currency
    $_SESSION['result'] = $input_amount * $dynamic_exchange_rate; 
    $result = number_format($_SESSION['result'], 3); // Format result to 2 decimals

    
    //  // // Store the calculation in an array (for demonstration purposes)
    // $calculation = [
    //   'currency1' => $selected_currency,
    //   'currency2' => $not_selected_currency,
    //   'amount' => $input_amount,
    //   'result' => number_format($_SESSION['result'], 1), ];

    // // Store the calculation array in a session variable
    // if (!isset($_SESSION['additions'])) {
    // $_SESSION['additions'] = [];  }
    // $_SESSION['additions'][] = $calculation;

} else  {
        echo "Start";
        }
?>


<br><br><br>


<!-- FORM -->
<!-- <div class="structure"> -->
    <div class="addition">
        <form action="/php/site_conversion/c_dollar.php" method='POST'>
            <label for="options">Selling</label><br><br>
            <select id="options" name="options">
                <option value="Euros" id="currency_eur">DOLLARS</option> 
                <option value="Dollars" id="currency_dol">EUROS</option>
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
  $rate= ($selected_currency==='Dollars') ? $exchange_rate : number_format((1 / $exchange_rate), 4);
  echo "<p>Result2: $input_amount $not_selected_currency at a rate of $rate = $result $selected_currency </p>"; 
}
?>


<!-- FOOTER -->
<?php
require "footer.php";
?>

</div>


