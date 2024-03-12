<?php
// Attention on reprend la session ouverte
session_start();
$title = "Debug";
$nav = "debug";
require "header2.php";
?>

<div class="structure">

  <div id="backgrtablebug">
  <table id="tabledebug">
    <tr>
      <th><h2>Session Actuelle</h2></th>
      <th id="th2"><h2>Debug</h2></th>
    </tr>           
    <tr>       
      <td id="imgbug">
        <img src="./images/bugfix2.jpg" alt="bug" width=200px> 
        <p>Page servant à montrer toutes les sessions en mode debug.</p>
      </td>
      <td><?php var_dump($_SESSION); ?>
      </td>
    </tr>
  </table>
  </div>

<br>

<!-- FOOTER -->
  <?php
  require "footer.php";
  ?>
  
</div>