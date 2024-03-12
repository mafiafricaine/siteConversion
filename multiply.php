<?php
session_start();
$title = "Multiplication";
$nav = "calculator";
require "header2.php";
if (!is_connected()) {
  header("Location: /php/site1php/login.php");
  exit(); 
}

// require "function_multiply"
?>

<div class="structure">

<h1>Multiplication</h1>

<?php

if (isset($_POST['nombre1']) && isset($_POST['nombre2'])) 
{
    $_SESSION['nbr_operations'] = isset($_SESSION['nbr_operations']) ? $_SESSION['nbr_operations'] + 1 : 1;
    
    echo "Another try?"; 

    $nombre1 = $_POST['nombre1'] ;
    $nombre2 = $_POST['nombre2'] ;

    // ?? 0 = default to zero if no set  
    $_SESSION['result'] = $nombre1*$nombre2;
    $result = $_SESSION['result'];
    
    // Store the calculation in an array (for demonstration purposes)
    $calculation = [
      'operation' => '*',
      'nombre1' => $nombre1,
      'nombre2' => $nombre2,
      'result' => $_SESSION['result'], ];

    // Store the calculation array in a session variable
    if (!isset($_SESSION['additions'])) {
    $_SESSION['additions'] = [];  }

    $_SESSION['additions'][] = $calculation;

} else  {
        echo "Start";
        }
?>

  <div class="addition">
    <form action="/php/site1php/multiply.php" method='POST'>
        <input type="number" name="nombre1" placeholder="Number1">
        <label for=""><img src="./images/multiply.jpg" alt="" width=20px id="imgmath"></label>
        <input type="number" name="nombre2" placeholder="Number2">
        
        <button class="btn_calculus" type="submit"><img src="./images/equal.jpg" alt="" width=20px id="imgmath"></button>
    </form> 

    <br>

      <?php 
      $nombre1 = $_POST['nombre1'] ?? 0;
      $nombre2 = $_POST['nombre2'] ?? 0;
      $_SESSION['result'] = $nombre1*$nombre2;
      $result = $_SESSION['result'];

      if (isset($_SESSION['result'])) : ?>
      <p>Result : <?php echo $nombre1 ?> * <?php echo $nombre2 ?> = <?php echo $_SESSION['result']; ?></p>
      <?php  endif; ?>

  </div>


<!-- FOOTER -->
<?php
require "footer.php";
?>

</div>


