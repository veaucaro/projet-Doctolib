<!-- ----- début viewInscription -->
<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <form role="form" method='get' action=router.php>
            <div class="form-group">
                <input type="hidden" name='action' value='InscriptionRead'>
                <style>
                    .red-title {
                        color: red;
                    }
                </style>
                <h2 class="red-title">Formulaire d'inscription </h2>
                <label for="nom">Nom :          </label><input type="text" id="nom" name="nom" value='LEMERCIER' required>
                <br>
                <label for="prenom">Prénom :          </label><input type="text" id="prenom" name="prenom" value='Marc' required>
                <br>
                <label for="adresse">Adresse :          </label><input type="text" id="adresse" name="adresse" value='Troyes' required>
                <br>
                <label for="login">Login :          </label><input type="text" id="login" name="login" required>
                <br>
                <label for="password">Password : </label><input type="password" id="password" name="password" value='secret' required>  
                <br>

                <label for="statut">Statut : </label> <select class="form-control" id='statut' name='statut' style="width: 200px">
                    <option value='2'>Patient</option>
                    <option value='1'>Praticien</option>
                    <option value='0'>Administrateur</option>

                </select>
                <br>

                <label for="spe">Votre spécialité si vous êtes praticien : </label> <select class="form-control" id='spe' name='spe' style="width: 300px">
                    <?php
                    foreach ($results as $spe) {
                        echo ("<option>");  echo $spe['label'];  echo (" </option>");
                    }
                    ?>
                </select>


            </div>
            <p/><br/>
            <button class="btn btn-primary" type="submit">Inscription</button>
        </form>
        <p/>
    </div>

    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
    <!-- ----- fin viewInscription -->

