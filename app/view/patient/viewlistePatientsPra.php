<!-- ----- début viewRDVprisPatient -->


<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';

        // $results contient un tableau avec la liste des clés.
        ?>
     
               <style>
          .red-title {
            color: red;
          }
        </style>
        <h2 class="red-title">Liste de mes patients </h2> 
        
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">Nom</th>
                    <th scope = "col">Prénom</th>
                    <th scope = "col">Adresse</th>
                </tr>
            </thead>
            <tbody>          
                <?php
                foreach ($results as $element) {
                    printf("<tr>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "</tr>", $element['nom'], $element['prenom'], $element['adresse']);
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

    <!-- ----- fin viewRDVprisPatient -->


