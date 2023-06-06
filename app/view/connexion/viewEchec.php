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
      
      <h1><?php echo $results?></h1>
      
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
  <!-- ----- fin viewDoctolibConnexion -->

