<!-- ----- début viewDoctolibConnexion -->
<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
      
    <form role="form" method='post' action=router.php>
      <div class="form-group">
        <input type="hidden" name='action' value='DoctolibConnexion'>
        <style>
          .red-title {
            color: red;
          }
        </style>
        <h2 class="red-title">Formulaire de connexion </h2>
        <label for="login">Login :          </label><input type="text" id="login" name="login" required>
        <br>
        <label for="password">Password : </label><input type="password" id="password" name="password" required>  
        </select>
      </div>
      <p/><br/>
      <button class="btn btn-primary" type="submit">Connexion</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
  <!-- ----- fin viewDoctolibConnexion -->

