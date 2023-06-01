<!-- ----- début viewDoctolibConnexion -->
<?php
$root = $_SERVER["DOCUMENT_ROOT"];
require ($root . '/projet/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/projet/app/view/fragment/fragmentDoctolibMenu.php';
    include $root . '/projet/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>

    <form role="form" method='post' action=ControllerConnexion.php>
      <a href="../../router/router.php"></a>
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
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/projet/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewDoctolibConnexion -->

