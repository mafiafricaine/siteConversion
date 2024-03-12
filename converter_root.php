<?php
session_start();
$title = "Converter";
$nav = "converter";
require "header2.php";

if (!is_connected()) {
  header("Location: /php/site_conversion/login.php");
  exit(); // Make sure to exit after sending the redirect header 
}

?>




<div class="structure">

<h1>Currency Converter</h1>


  <!-- <div id="backgrtablelogin"> -->

      <?php

      $exchange_rate=$_SESSION['eur-dol'] ?? 0;
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
            'result' => number_format($_SESSION['result'], 2), ];

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
      
        <div class="backg_currencies">  
          <div class="addition">
            <form action="/php/site_conversion/converter_root.php" method='POST'>

              <div class="conv_form4">

                  <div>
                    <label for="options">SELL:  </label>
                    <select id="options" name="options">
                        <option value="Euros" id="currency_eur">EUROS</option>
                        <option value="Dollars" id="currency_dol">DOLLARS</option>
                    </select>
                  </div>

                  <div>
                    <label for="options">BUY:  </label>
                    <select id="options" name="options">
                        <option value="Euros" id="currency_eur">DOLLARS</option>
                        <option value="Dollars" id="currency_dol">EUROS</option>
                    </select>
                  </div>  

                  <div>
                    <label for="options">SELL AMOUNT:  </label>
                    <input type="number" name="nombre1" placeholder="Sell Big Today!" step="any">
                  </div>

                  <div id="img_equal">
                     <button class="btn_calculus" type="submit"><img src="./images/equal.jpg" alt="" width=20px id="imgmath"></button>
                  </div>

                  <div id="cur_result">
                    <?php 
                          if (isset($_POST['nombre1'])) {
                            echo $result;
                            }
                    ?>
                  </div>
              </div>    

            </form>
            
            <br>

            <div class="error"><img src="./images/guy2.jpg" alt="guy2" id="imgguy"> 
              <?php 
                  if (isset($_POST['nombre1'])) {
                  echo "<p>&nbsp&nbsp&nbsp Result: $input_amount * $dynamic_exchange_rate = $result</p>";
                  }
              ?>
            </div>


          </div>
        </div>  


      <!-- END FORM -->

      <!-- Display the result -->
     

      

  <!-- </div> -->






<!-- FOOTER -->
<?php
require "footer.php";
?>
