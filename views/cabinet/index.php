<?php
$title = "Mi Cuenta";
include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h3>Cuenta del usuario</h3>
            
            <h4>Hola, <?php echo $user['name'];?>!</h4>
            <ul>
                <li><a href="/cabinet/edit">Editar los datos</a></li>
                <!--<li><a href="/cabinet/history">Список покупок</a></li>-->
            </ul>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>