<?php
session_start();
$title = "Converter";
$nav = "converter";
require "header2.php";

if (!is_connected()) {
  header("Location: /php/site_conversion/login.php");
  exit(); 
}

?>

<div class="structure">

<h1>Currency Converter</h1>


  <!-- <div id="backgrtablelogin"> -->

      <?php

      $currency_options = ['EUROS', 'DOLLARS', 'YENS', 'POUNDS', 'FRANCS-RDC', 'DIRHAM', 'GRIVNAS'];
      // NEW 

      // $exchange_rates=$_SESSION['exrates'][''] ?? 0;

      $exchange_rates = [
        'Euro' => $_SESSION['exrates']['eur-eur'] ?? 0, 
        'Dollar' => $_SESSION['exrates']['eur-dol'] ?? 0, 
        'Yen' => $_SESSION['exrates']['eur-yen'] ?? 0,
        'Pound' => $_SESSION['exrates']['eur-pou'] ?? 0,
        'RDC' => $_SESSION['exrates']['eur-rdc'] ?? 0,
        'Dirham' => $_SESSION['exrates']['eur-dir'] ?? 0,
        'Grivna' => $_SESSION['exrates']['eur-gri'] ?? 0,
    ];

      $selected_sell = $_POST['sell'] ?? ''; 
      $selected_buy = $_POST['buy'] ?? ''; 
      
      $input_amount = $_POST['nombre1'] ?? 0;

      if (isset($_POST['nombre1'])) 
      {   
          echo "Another try?"; 

            if ($selected_sell_currency = $currency_options['EUROS']) {
                $rate=$exchange_rates[$selected_buy] ;

                $_SESSION['result'] = $input_amount * $rate;
                $result = number_format($_SESSION['result'], 2);
                }
        
            if ($selected_buy_currency = $currency_options['EUROS']) {
                $rate=$exchange_rates[$selected_sell] ;
                $inverted_rate = 1 / $rate;

                $_SESSION['result'] = $input_amount * $inverted_rate;
                $result = number_format($_SESSION['result'], 2);

            }

            else {


                $sell_exrate = $ex_rates[$selected_sell] ?? 0;
                $buy_exrate = $ex_rates[$selected_buy] ?? 0; 

               
          // // Determine the not selected currency
          // $not_selected_currency = ($selected_currency === 'Euros') ? 'Dollars' : 'Euros';

          // // Dynamically retrieve the exchange rate based on the selected currency
          // $dynamic_exchange_rate = ($selected_currency === 'Euros') ? $exchange_rate : number_format((1 / $exchange_rate),2);

          // // Calculate the result based on the selected currency
          // $_SESSION['result'] = $input_amount * $dynamic_exchange_rate; 
          // $result = number_format($_SESSION['result'], 2); // Format result to 2 decimals

                $_SESSION['result'] = $input_amount * ($buy_exrate / $sell_exrate);
                $result = number_format($_SESSION['result'], 2);

                }

          
          // // Store the calculation in an array (for demonstration purposes)
          $calculation = [
            'currency1' => $selected_sell_currency,
            'currency2' => $selected_buy_currency,
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
            <form action="/php/site_conversion/converter.php" method='POST'>

              <div class="conv_form4">

                  <div>
                    <label for="sell">SELL:  </label>
                    <select id="sell" name="sell">
                        <!-- <option value="Euros" id="currency_eur">EUROS</option>
                        <option value="Dollars" id="currency_dol">DOLLARS</option>
                        <option value="Pounds" id="currency_pou">POUNDS</option>
                        <option value="Francs-rdc" id="currency_rdc">FRANCS-RDC</option>
                        <option value="Dirhams" id="currency_dir">DIRHAMS</option>
                        <option value="Grivnas" id="currency_gri">GRIVNAS</option> -->

                        <?php
                            foreach ($currency_options as $currency) {
                                echo "<option value='$currency' " . ($selected_sell === $currency ? 'selected' : '') . ">$currency</option>";
                            }
                        ?>

                    </select>
                  </div>

                  <div>
                    <label for="buy">BUY:  </label>
                    <select id="buy" name="buy">
                        <!-- <option value="Euros" id="currency_eur">DOLLARS</option>
                        <option value="Dollars" id="currency_dol">EUROS</option>
                        <option value="Pounds" id="currency_pou">POUNDS</option>
                        <option value="Francs-rdc" id="currency_rdc">FRANCS-RDC</option>
                        <option value="Dirhams" id="currency_dir">DIRHAMS</option>
                        <option value="Grivnas" id="currency_gri">GRIVNAS</option> -->

                        <?php
                            foreach ($currency_options as $currency) {
                                echo "<option value='$currency' " . ($selected_buy === $currency ? 'selected' : '') . ">$currency</option>";
                            }
                        ?>
                                      
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
                  echo "<p>&nbsp&nbsp&nbsp Selling $input_amount ' '  $selected_sell = $result ' ' $selected_buy</p>";
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
