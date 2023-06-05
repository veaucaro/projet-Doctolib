<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>

        <form role="form" method="get" action="router.php">
            <div class="form-group">
                <input type="hidden" name="action" value="AjoutDispoBase">
                <style>
                    .red-title {
                        color: red;
                    }
                </style>
                <h2 class="red-title">Ajout de nouvelles disponibilités</h2>
                <label for="rdv_date">Date du premier rendez-vous (YY-mm-dd) </label>
                <input type="text" id="rdv_date" name="rdv_date" value = '2024-12-12' required>
                <br>
                <label for="rdv_nombre">Nombre de rendez-vous </label><input type="number" min="1" id="rdv_nombre" name="rdv_nombre" required>  
                </select>
            </div>
            <p/><br/>
            <button class="btn btn-primary" type="submit">Go</button>
        </form>
        <p/>
    </div>

    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>
