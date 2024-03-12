<?php
session_start();
$title = "Home";
$nav = "home";
$_SESSION['user'] = [
    'login' => 'vitop',
    'password' => 123,
    'date started' => "25/01/2024",    
];

$_SESSION['exrates'] = [
  'eur-eur' => 1.0,
  'eur-dol' => 1.1,
  'eur-yen' => 160.92,
  'eur-pou' => 0.86, 
  'eur-rdc' => 2951.55,
  'eur-dir' => 10.88,
  'eur-gri' => 40.87,
];

// $_SESSION['eur-dol'] = 1.1; 
// $_SESSION['eur-yen'] = 160.92;
// $_SESSION['eur-pou'] = 0.86;
// $_SESSION['eur-rdc'] = 2951.55;
// $_SESSION['eur-dir'] = 10.88;
// $_SESSION['eur-gri'] = 40.87; 
 
?>


<body>

<div class="section1">

  <?php require "header.php";?>

  <div class="titre">
    <div id="titre">The site for converting currencies</div>
    <p><span style="color: #404040;">The converter</span></p>
  </div>
</div>   <!-- end section 1 -->


<!-- SECTION2 -->
<div class="section2">
  <div class="structure">

<div class="textsection2">    
<div class="ph">
  <p id="ph1">The Best Bureau de Change</p>
  <p id="ph2">Renowned for excellence, our bureau de change has proudly secured international recognition, winning prestigious awards for our unwavering commitment to superior currency exchange services and customer satisfaction."</p>
  <button id="btmore">More</button>
</div>

<div class="ph3">
  <p id="ph1">Popular Currencies</p>
  <p id="ph2">Discover our top currencies for seamless transactions. USD, EUR, GBP – Experience convenience with our most popular exchange options.</p>
  <button id="btmore">More</button>
</div>
</div>

</div>
</div>

<!-- SECTION3 -->

<div class="section3">
  <div class="structure">

<div id="titresection3">
<p id="titresect3">Our Experts</p>
<p></p>
</div>


<div class="profiles">
  <button id="button"><span style="color: white"><</span></button>

<div id="card">
  <img src="./images/pic03.jpg" alt="pic3" id="imgprofile">
  <p id="nameexpert">Joseph Almerin</p>
  <p>Risk Management</p>
</div>

<div id="card">
  <img src="./images/pic04.jpg" alt="pic3" id="imgprofile">
  <p id="nameexpert">Yoland Traz</p>
  <p>Financial Analysis</p>
</div>

<div id="card">
  <img src="./images/pic05.jpg" alt="pic3" id="imgprofile">
  <p id="nameexpert">Pascal Borthel</p>
  <p>Tax Planning</p>
</div>

<div id="card">
  <img src="./images/pic06.jpg" alt="pic3" id="imgprofile">
  <p id="nameexpert">Roberta Bela</p>
  <p>Investments</p>
</div>

<button id="button"><span style="color: white;">></span></button>
</div>

</div>
</div>


<div class="structure">

<!-- FOOTER -->

<?php
require "footer.php";
?>

</div>


</body>
</html>