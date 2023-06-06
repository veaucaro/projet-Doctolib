<!-- ----- début viewSupprRDV -->
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>

    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='dispoSuppr'>
        <label for="dispo">Disponibilité à supprimer </label> <select class="form-control" id='dispo' name='dispo' style="width: 250px">
            <?php
            foreach ($results as $dispos) {
             echo ("<option>$dispos</option>");
            }
            ?>
        </select>
      </div>
      <p/><br/>
      <button class="btn btn-primary" type="submit">Envoyer</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewSupprRDV -->