<?php
session_start();
$title = "MyProfile";
$nav = "myprofile";
require "header2.php"; 

if (!is_connected()) {
    header('Location: /php/site_conversion/login.php');
}
?>

<div class="structure">

  <div class="myprofile">
    <div id="cardmyprofile">
      <img src="./images/pic05.jpg" alt="pic4" id="imgmyprofile"> 
      <p><?php echo $_SESSION['pseudo']; ?> Silver</p>
      <p>Age: 22</p>
      <p>City: Wakanda</p>
      <p># Operat.: 346</p>
    </div>
 
    <div class="activities">
      <h2>Exchange Rates</h2>
      <div class="log">
        <div id="mycalculus">
          <p> <img src="./images/calculator2.jpg" alt="calculator" width=25px> Operations</p>

          <table class="tbcalculus">
                <thead>
                    <tr id="cell_cal">
                        <th id="cell_cal">Sell</th>
                        <th id="cell_cal">Amount</th>
                        <th id="cell_cal">Buy</th>
                        <th id="cell_cal">Get</th>
                    </tr>
                </thead>
                <tbody>
              

                <?php 

                  if (!isset($_SESSION['additions'])) {
                  $_SESSION['additions'] = null;
                  }
                  else 
                  foreach ($_SESSION['additions'] as $calculation):
                  ?> 
                  <tr id="cell_cal">
                    <td id="cell_cal_o"><?php echo $calculation['currency1']; ?></td> 
                    <td id="cell_cal_n"><?php echo $calculation['amount']; ?></td>
                    <td id="cell_cal_n2"><?php echo $calculation['currency2']; ?></td>
                    <td id="cell_cal_r"><?php echo $calculation['result']; ?></td>
                  </tr>
                <?php endforeach; ?>

                
                </tbody>
            </table>
        </div>  
        
        <div id="mylog">
        <p> <img src="./images/icon_erate3.jpg" alt="log" width=25px> Exchange Rates (Selling Euros)</p>

        <div id="exrates">
          
          <table class="tbcalculus">
                <thead>
                    <tr id="cell_cal">
                        <th id="cell_cal">Buy</th>
                        <th id="cell_cal">Exchange Rate</th>
                        <!-- <th id="cell_cal">Result</th> -->
                    </tr>
                    <tr id="cell_cal">
                        
                        <th id="cell_cal8">Dollars</th>
                        <th id="cell_cal"><?php echo $_SESSION['exrates']['eur-dol'] ?></th> 
                        
                        <!-- <th id="cell_cal">Result</th> -->
                    </tr> 
                    <tr id="cell_cal">
                        
                        <th id="cell_cal8">Yens</th>
                        <th id="cell_cal"><?php echo $_SESSION['exrates']['eur-yen'] ?></th>
                        <!-- <th id="cell_cal">Result</th> -->
                    </tr>
                    <tr id="cell_cal">
                        
                        <th id="cell_cal8">Pounds</th>
                        <th id="cell_cal"><?php echo $_SESSION['exrates']['eur-pou'] ?></th>
                        <!-- <th id="cell_cal">Result</th> -->
                    </tr>
                    <tr id="cell_cal">
                        
                        <th id="cell_cal8">Francs RDC</th>
                        <th id="cell_cal"><?php echo $_SESSION['exrates']['eur-rdc'] ?></th>
                        <!-- <th id="cell_cal">Result</th> -->
                    </tr>
                    <tr id="cell_cal">
                        
                        <th id="cell_cal8">Dirhams</th>
                        <th id="cell_cal"><?php echo $_SESSION['exrates']['eur-dir'] ?></th>
                        <!-- <th id="cell_cal">Result</th> -->
                    </tr>
                    <tr id="cell_cal">
                        
                        <th id="cell_cal8">Grivnas</th>
                        <th id="cell_cal"><?php echo $_SESSION['exrates']['eur-gri'] ?></th>
                        <!-- <th id="cell_cal">Result</th> -->
                    </tr>

                </thead>
                
            </table>




        </div>
          
        </div>

      </div>







      <div class="activities">
      <h2></h2>
        <div class="log">
          <div id="mycalculus2">
            <p> <img src="./images/bugfix2.jpg" alt="buf2" width=25px>Sessions</p>
            <?php var_dump($_SESSION); ?>
            
          </div>  
        </div>
      </div>
 
    </div>

  </div>



<!-- FOOTER -->
<?php
require "footer.php";
?>

</div>

