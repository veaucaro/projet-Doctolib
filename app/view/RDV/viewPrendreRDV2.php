<!-- ----- début viewId -->
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
       <style>
          .red-title {
            color: red;
          }
        </style>
        <h2 class="red-title">Sélection du rendez-vous </h2> 
        
    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='prendreRDV2'>
        <input type="hidden" name='praticien' value=<?php $praticien_id?>>
        <label for="RDV">Votre rendez-vous: </label> <select class="form-control" id='RDV' name='RDV' style="width: 200px">
            <?php
            foreach ($results as $date) {
             echo ("<option>$date</option>");
            }
            ?>
        </select>
      </div>
      <p/><br/>
      <button class="btn btn-primary" type="submit">Sélectionner</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewId -->