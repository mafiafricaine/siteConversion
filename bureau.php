<?php
session_start();
$title = "Bureau";
$nav = "bureau";
require "header2.php";
?>

<div class="structure">

<h1>Bureau of exchange</h1>

<DIV class="flags_bureau">
  <a href=""> <img src="./images/Flag_of_Europe.png" alt="usa"></a>
  <a href="http://localhost/php/site_conversion/c_dollar.php"> <img src="./images/flag_usa.png" alt="usa"></a>
  <a href="http://localhost/php/site_conversion/c_yen.php"><img src="./images/flag_china2.png" alt="usa"></a>
  <a href="http://localhost/php/site_conversion/c_pound.php"><img src="./images/flag_uk2.png" alt="usa"></a>
  <a href="http://localhost/php/site_conversion/c_grivna.php"><img src="./images/Flag_of_Ukraine.svg" alt="usa"></a>
  <a href="http://localhost/php/site_conversion/c_dirham.php"><img src="./images/Flag_of_Morocco.svg" alt="usa"></a>
  <a href="http://localhost/php/site_conversion/c_rdc.php"><img src="./images/Flag_of_Democratic_Republic_of_Congo.svg" alt="usa"></a>
 </DIV>



 
<style>

.flags_bureau{
  display: flex;
  justify-content: space-around;
  gap: 5px;
}

.flags_bureau img{
  display: flex;
  justify-content: space-around;
height: 80px;
/* width: 90px; */
border-radius: 8px;
}

</style>

<!-- FOOTER -->
<?php
require "footer.php";
?>

</div>


