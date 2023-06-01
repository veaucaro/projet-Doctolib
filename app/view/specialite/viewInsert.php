<!-- ----- début viewInsert -->
 
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
        <input type="hidden" name='action' value='specialiteCreated'>        
        <label class='w-25' for="id">Label : </label><input type="text" name='label' size='75' value='Podologue'> <br/>                                   
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Enregistrer</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewInsert -->



