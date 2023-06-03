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
        <h2 class="red-title">Sélection d'un praticien </h2> 
        
    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='prendreRDV1'>
        <label for="praticien">Votre praticien: </label> <select class="form-control" id='praticien' name='praticien' style="width: 200px">
            <?php
            foreach ($results as $praticien) {
             echo ("<option>$praticien</option>");
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