<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row admin-text-color">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/service">Управление услугами</a></li>
                    <li class="active">Удалить услугу</li>
                </ol>
            </div>


            <h4>Удалить услугу #<?php echo $id; ?></h4>


            <p>Вы действительно хотите удалить эту услугу?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

