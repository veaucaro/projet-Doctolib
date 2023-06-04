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
        <h2 class="red-title">Informations sur votre rendez-vous </h2> 
        
        <p> Les informations de votre rendez-vous: </p>
        <p> Votre rendez-vous se déroulera avec: <?php echo $nom . ' ' . $prenom;?> </p>
        <p> La date de votre rendez-vous est:  <?php echo $RDV?> </p>
        

    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewId -->