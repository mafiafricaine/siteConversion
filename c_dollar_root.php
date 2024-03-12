<?php
session_start();
$title = "Dollars";
$nav = "converter";
require "header2.php";
if (!is_connected()) {
  header("Location: /php/site_conversion/login.php");
  exit(); 
}

?>

<div class="structure">

<h1>Dollars vs Euros</h1>

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
    $dynamic_exchange_rate = ($selected_currency === 'Euros') ? $exchange_rate : number_format((1 / $exchange_rate),2);

    // Calculate the result based on the selected currency
    $_SESSION['result'] = $input_amount * $dynamic_exchange_rate; 
    $result = number_format($_SESSION['result'], 2); // Format result to 2 decimals

    
     // // Store the calculation in an array (for demonstration purposes)
    $calculation = [
      'currency1' => $selected_currency,
      'currency2' => $not_selected_currency,
      'amount' => $input_amount,
      'result' => number_format($_SESSION['result'], 0), ];

    // Store the calculation array in a session variable
    if (!isset($_SESSION['additions'])) {
    $_SESSION['additions'] = [];  }
    $_SESSION['additions'][] = $calculation;

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
                <option value="Euros" id="currency_eur">EUROS</option> 
                <option value="Dollars" id="currency_dol">DOLLARS</option>
            </select>

            
            <input type="number" name="nombre1" placeholder="Amount" step="any">
            <button class="btn_calculus" type="submit"><img src="./images/equal.jpg" alt="" width=20px id="imgmath"></button>
        </form>
    </div>


<!-- END FORM -->

<!-- Display the result -->
<?php 
if (isset($_POST['nombre1'])) {
  echo "<p>Result: $input_amount * $dynamic_exchange_rate = $result</p>"; 
}
?>

<!-- PREVIOUS VERSION -->

<!-- <?php 
  if (isset($_POST['nombre1'])) {
    // Calculate the result based on the selected currency
    if ($selected_currency === 'Euros') {
        $_SESSION['result'] = $input_amount * $exchange_rate;
        $result=$_SESSION['result'];
        // echo "<p>Result: $input_amount * $exchange_rate = $result</p>";
    } else {
        $inverted_rate = 1 / $exchange_rate;
        $_SESSION['result'] = $input_amount * $inverted_rate;
        $result=$_SESSION['result'];
        echo "<p>Result: $input_amount * $inverted_rate = $result</p>";
    }

    
  }
?> -->



<!-- FOOTER -->
<?php
require "footer.php";
?>

</div>


