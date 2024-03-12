<?php
// session_start();
$title = "Contact";
$nav = "contact";
require "header2.php"; 
?>

<!-- <head>

      <script src="https://maps.googleapis.com/maps/api/js"></script>
      <script type="text/javascript">
          jQuery(function ($) {
           // Google Maps setup
           var googlemap = new google.maps.Map(
            document.getElementById('googlemap'),
            {
                center: new google.maps.LatLng(44.5403, -78.5463),
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            );
          });  </script>


</head> -->
<body class="body">

<div class="structure">

  <h2 class="h2"> Contact Us</h2>
  <!-- <div class="line"></div> --> 
  <div class="contact">
    <div id="map">
          <img src="./images/map_address.png" alt="map">
    </div>  
        
    <div id="form">

      <form>
          
          <label for="name" id="label_contact_form">Name</label><br>
          <input type="text" id="name" placeholder="" >
          <br><br>

          <label for="email" id="label_contact_form">Email Address</label><br>
          <input type="email" id="email" placeholder="@" >
          <br><br>
          
          <label for="tel" id="label_contact_form">Telephone</label><br>
          <input type="number" id="tel" placeholder="" >
          <br><br>
          
          <label for="message" id="label_contact_form">Comments</label><br>
          <textarea type="text" id="message" placeholder="Hello, I wish to ..." rows="4" ></textarea>
          <br><br><br>
          
          <div id="btn"><button class="btn_submit" type="submit">Contact Us</button>       
          <br><br>
          </div>         
      
        </form>

      
    </div>

  </div> 

  



<!-- FOOTER -->
<?php
require "footer2.php";
?>



