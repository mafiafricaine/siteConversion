<?php
  // $title = "Login";
  $nav = "login";
  require "header2.php";
  // $_SESSION['additions']=null;
  //cette condition verifie si on est connecté grace a notre fonction  
  //et verifie si on est connecté. Dans le cas ou on est connecté il nous redirige vers myprofile
  if (is_connected()) :
      header("Location: /php/site_converstion/myprofile.php");
  endif;

  // if (is_connected()) {
  //   // Initialize or retrieve the session variable
  //   $_SESSION['nbr_operations'] = $_SESSION['nbr_operations'] ?? 0;
  // }


  $erreur = null;
  if (!empty($_POST['pseudo']) || !empty($_POST['password'])) :
      if ($_POST['pseudo'] === "vitop" && $_POST['password'] === "123") :
          $_SESSION['pseudo'] = $_POST['pseudo'];
          $_SESSION['connected'] = true;
          //redirection
          header('Location: /php/site_conversion/myprofile.php');
      else :
          $erreur = "Identifiant incorrect !";
      endif;
  endif;
  // this is an alternate syntax that does not use {} and uses "endif" 


  if ($erreur) : ?>
      <div>
        <?php echo $erreur ?>
      </div>
  <?php endif; ?>


<div class="structure"> 

  <div id="backgrtablelogin">
    <table id="tabledebug">
      <tr>
        <th><h2>Login</h2></th>
        <th id="th2"><h2>Introduction des données</h2></th>
      </tr>           
      <tr>       
        <td id="imglogin">
          <img src="./images/login2.jpg" alt="login" height=200px> 
        </td>
        <td>
          <form action="/php/site_conversion/login.php" method="POST">
            <input type="text" name="pseudo" placeholder="Votre Login">
            <br><br>
            <input type="password" name="password" placeholder="Votre mot de passe">
            <br><br>
            <button id="button_submit" type="submit">Se connecter</button>
          </form>
        </td>
      </tr>
    </table>
  </div>

<br>


<!-- FOOTER -->
<?php
require "footer.php";
?>