<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row admin-text-color">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/service">Управление услугами</a></li>
                    <li class="active">Добавить услугу</li>
                </ol>
            </div>

            <h4>Добавить новую услугу</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="">
						
						<p>Описание</p>
                        <input type="text" name="description" placeholder="" value="">

                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="">
						
						<p>Изображение услуги</p>
                        <input type="file" name="imgservice" placeholder="" value="">

                        <br><br>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

