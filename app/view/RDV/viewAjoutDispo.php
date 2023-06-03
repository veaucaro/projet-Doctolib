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


    <form role="form" method="post" action="router.php">
      <div class="form-group">
        <input type="hidden" name="action" value="AjoutDispo">
        <style>
          .red-title {
            color: red;
          }
        </style>
        <h2 class="red-title">Ajout de nouvelles disponibilités</h2>
        <label for="rdv_date">rdv_date :</label>
        <input type="date" id="date_jour" name="date_jour" required>
        <br>
        <label for="rdv_nombre">rdv_nombre : </label><input type="number" min="1" id="rdv_nombre" name="rdv_nombre" required>  
        </select>
      </div>
      <p/><br/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/projet/app/view/fragment/fragmentDoctolibFooter.html'; ?>
