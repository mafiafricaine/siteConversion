<?php
require_once "functions/authentification.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/site1php.css">
  <link rel="stylesheet" href="./css/0navigation.css">
  <link rel="stylesheet" href="./css/1homepage.css">
  <link rel="stylesheet" href="./css/2pages.css">
  <link rel="stylesheet" href="./css/5calculator.css">
  <link rel="stylesheet" href="./css/contact.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
  
  <title>
    <?php 
      if (isset($title)) :
      echo $title;
      else :
      echo "Site in PHP";
      endif;
    ?>
  </title>
</head>

<body>
<div class="backgcolorheader2">

  <div class="structure">

    <div id="nav2">
      <div>
        <a href="/php/site_conversion/home.php" id="titrenav02">Bureau de Change</a>
      </div>
      
      <div id="titres_nav">
        <div <?php if ($nav === 'home') echo 'class="current-page"'; ?>><a href="/php/site_conversion/home.php" id="titrenav1">Home</a></div> 
        
        <div class="dropdown-menu">
            <div <?php if ($nav === 'bureau' || $nav === 'dollars' || $nav === 'yens' || $nav === 'dirhams' || $nav === 'grivnas' || $nav === 'rdc' ) echo 'class="current-page"'; ?>><a href="/php/site_conversion/bureau.php" id="titrenav1">Bureau</a></div>
            <div class="dropdown-content">
              <a href="c_dollar.php"><img src="./images/Flag_of_United_States.svg" alt="usa" width="30px" height="20px"> Dollars</a>
              <a href="c_yen.php"><img src="./images/Flag_of_Peoples_Republic_of_China.svg" alt="usa" width="30px" height="20px"> Yen</a>
              <a href="c_pound.php"><img src="./images/Flag_of_United_Kingdom.svg" alt="usa" width="30px" height="20px"> Pounds</a>
              <a href="c_rdc.php"><img src="./images/Flag_of_Democratic_Republic_of_Congo.svg" alt="usa" width="30px" height="20px"> FrancsRDC</a>
              <a href="c_dirham.php"><img src="./images/Flag_of_Morocco.svg" alt="usa" width="30px" height="20px"> Dirham</a>
              <a href="c_grivna.php"><img src="./images/Flag_of_Ukraine.svg" alt="usa" width="30px" height="20px"> Grivnas</a>
            </div>
        </div>

        <div <?php if ($nav === 'contact') echo 'class="current-page"'; ?>> <a href="/php/site_conversion/contact.php" id="titrenav1">Contact</a></div> 

        <div <?php if ($nav === 'myprofile') echo 'class="current-page"'; ?>><a href="/php/site_conversion/myprofile.php" id="titrenav1">MyProfile</a></div>

        <?php if (is_connected()) : ?>  
          <div <?php if ($nav === 'converter') echo 'class="current-page"'; ?>><a href="/php/site_conversion/converter.php" id="titrenav1">Converter</a></div> 
        <?php endif; ?>
        
        <?php if (!is_connected()) : ?>
          <div <?php if ($nav === 'login') echo 'class="current-page"'; ?>><a href="/php/site_conversion/login.php" id="titrenavlogin">Login</a></div>
            <?php else : ?>
              <div><a href="/php/site_conversion/logout.php" id="titrenavlogout">Logout</a></div>
        <?php endif; ?>

      </div>

    </div>

  </div>
</div>

</body>
</html>

