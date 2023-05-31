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


        <h3>Liste des spécialités</h3>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">Spécialités</th>
                </tr>
            </thead>
            <tbody>          
                <?php
                foreach ($results1 as $element) {
                    printf("<tr>"
                            . "<td>%s</td>"
                            . "</tr>", $element);
                }
                ?>
            </tbody>
        </table>

        </br>
        <h3>Liste des praticiens</h3>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">Nom du praticien</th>
                    <th scope = "col">Prénom du praticien</th>
                </tr>
            </thead>
            <tbody>          
                <?php
                foreach ($results2 as $element) {
                    printf("<tr>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "</tr>", $element['nom'], $element['prenom']);
                }
                ?>
            </tbody>
        </table>

        </br>
        <h3>Liste des patients</h3>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">Nom du patients</th>
                    <th scope = "col">Prénom du patients</th>
                </tr>
            </thead>
            <tbody>          
                <?php
                foreach ($results3 as $element) {
                    printf("<tr>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "</tr>", $element['nom'], $element['prenom']);
                }
                ?>
            </tbody>
        </table>

        </br>
        <h3>Liste des administrateurs</h3>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">Nom du administrateurs</th>
                    <th scope = "col">Prénom du administrateurs</th>
                </tr>
            </thead>
            <tbody>          
                <?php
                foreach ($results4 as $element) {
                    printf("<tr>"
                            . "<td>%s</td>"
                            . "<td>%s</td>"
                            . "</tr>", $element['nom'], $element['prenom']);
                }
                ?>
            </tbody>
        </table>

        </br>
        <h3>Liste des rendez-vous</h3>
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope = "col">Id du Patient</th>
                    <th scope = "col">Id du Praticien</th>
                    <th scope = "col">Date</th>
                </tr>
            </thead>
            <tbody>          
                <?php
                foreach ($results5 as $element) {
                    printf("<tr>"
                            . "<td>%d</td>"
                            . "<td>%d</td>"
                            . "<td>%s</td>"
                            . "</tr>", $element['patient_id'], $element['praticien_id'], $element['rdv_date']);
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

    <!-- ----- fin viewAll -->
