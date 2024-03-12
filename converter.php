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

      $currency_options = ['EUROS', 'DOLLARS', 'YENS', 'POUNDS', 'FRANCS_RDC', 'DIRHAMS', 'GRIVNAS'];

      // $exchange_rates=$_SESSION['exrates'][''] ?? 0;

      $exchange_rates = [
        'EUROS' => $_SESSION['exrates']['eur-eur'] ?? 0, // new and mandatory to have, otherwise once euros are selected errors appear
        'DOLLARS' => $_SESSION['exrates']['eur-dol'] ?? 0, 
        'YENS' => $_SESSION['exrates']['eur-yen'] ?? 0, 
        'POUNDS' => $_SESSION['exrates']['eur-pou'] ?? 0,
        'FRANCS_RDC' => $_SESSION['exrates']['eur-rdc'] ?? 0,
        'DIRHAMS' => $_SESSION['exrates']['eur-dir'] ?? 0,
        'GRIVNAS' => $_SESSION['exrates']['eur-gri'] ?? 0,
    ];

      $selected_sell_currency =$_POST['sell'] ?? 'EUROS';
      $selected_buy_currency = $_POST['buy'] ?? 'DOLLARS';
      
      $input_amount = $_POST['nombre1'] ?? 0;

      $result = 0;  // Initialize the result variable


      if (isset($_POST['nombre1'])) 
      {   
          echo "Another try?"; 

            if ($selected_sell_currency === 'Euro') {
              $rate = $exchange_rates[$selected_buy_currency] ?? 0;

              if ($rate != 0 && $input_amount != '') {   
                  $_SESSION['result'] = $input_amount * $rate;
                  $result = number_format($_SESSION['result'], 2);                           
              } else {
                echo 'We are doomed!';
                }
            }

            if ($selected_sell_currency !== 'Euro') {
              $rate = $exchange_rates[$selected_buy_currency]/$exchange_rates[$selected_sell_currency] ?? 0;
            
              if ($rate != 0 && $input_amount != '') {   
                  $_SESSION['result'] = $input_amount * $rate;
                  $result = number_format($_SESSION['result'], 2);                           
              } else {
                echo ' No!!, we are doomed!';
                }
            }

          
            // if ($selected_buy_currency === 'Euro') {
            //     $rate = $exchange_rates[$selected_sell_currency] ?? 0;
            //     if ($rate != 0 && $input_amount != 0) {
            //         $inverted_rate = 1 / $rate;
            //         $_SESSION['result'] = $input_amount * $inverted_rate;
            //         $result = number_format($_SESSION['result'], 2);                     
            //     } else {
            //         echo 'We are doomed!2';
            //       }
            // }
                 
            // else {
            //     $sell_exrate = $exchange_rates[$selected_sell_currency] ?? 0;
            //     $buy_exrate = $exchange_rates[$selected_buy_currency] ?? 0; 
            //       if ($buy_exrate !=0 && $sell_exrate != 0 && $input_amount != '') {
            //         $_SESSION['result'] = $input_amount * ($buy_exrate / $sell_exrate);
            //         $result = number_format($_SESSION['result'], 2);
            //         } else {
            //             echo 'A e-rate that equals zero. We are doomedx3!';
            //           }
            // }

          
          // // Store the calculation in an array (for demonstration purposes)
          if ($input_amount != '') {
          $calculation = [
            'currency1' => $selected_sell_currency,
            'currency2' => $selected_buy_currency,
            'amount' => $input_amount,
            'result' => number_format($_SESSION['result'], 2), ];
          } else {
              echo " Amount can not be empty!";
            }


          // Store the calculation array in a session variable
          if (!isset($_SESSION['additions'])) {
          $_SESSION['additions'] = [];  }
          
          if ($input_amount != '') {
          $_SESSION['additions'][] = $calculation;} 

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
                      
                        <?php
                            foreach ($currency_options as $currency) {
                                echo "<option value='$currency' " . ($selected_sell_currency === $currency ? 'selected' : '') . ">$currency</option>";
                            }
                        ?>

                    </select>
                  </div>

                  <div>
                    <label for="buy">BUY:  </label>
                    <select id="buy" name="buy">
                       
                        <?php
                            foreach ($currency_options as $currency) {
                                echo "<option value='$currency' " . ($selected_buy_currency === $currency ? 'selected' : '') . ">$currency</option>";
                            }
                        ?>
                                      
                    </select>
                  </div>  

                  <div>
                    <label for="options">SELL AMOUNT:  </label>
                    <input type="number" name="nombre1" placeholder="Sell Big Today!" step="any" id="conv_amount">
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

            <div class="error"><img src="./images/fox2.jpg" alt="guy2" id="imgguy"> 
              <?php 
              
              if (isset($_POST['nombre1'])) {
                // echo "<p>&nbsp&nbsp&nbsp Selling $input_amount $selected_sell_currency  = $result $selected_buy_currency </p>";
                $ratefinal=number_format($exchange_rates[$selected_buy_currency]/$exchange_rates[$selected_sell_currency], 4);
                echo "<p>&nbsp&nbsp&nbsp Selling $input_amount $selected_sell_currency at a rate of $ratefinal = $result $selected_buy_currency </p>";
              }

              ?>

            </div>


          </div>
        </div>  




<!-- FOOTER -->
<?php
require "footer.php";
?>
