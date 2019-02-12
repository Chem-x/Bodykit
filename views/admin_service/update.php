<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row admin-text-color">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/service">Управление услугами</a></li>
                    <li class="active">Редактировать услугу</li>
                </ol>
            </div>

            <h4>Редактировать услугу "<?php echo $service['name']; ?>"</h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $service['name']; ?>">
						
						<p>Описание</p>
                        <input type="text" name="description" placeholder="" value="<?php echo $service['description']; ?>">

                        <p>Порядковый номер</p>
                        <input type="text" name="sort_order" placeholder="" value="<?php echo $service['sort_order']; ?>">
						
						<p>Картинка</p>
						<img src="<?php echo Service::getImage($service['id']); ?>" width="200" alt="" />
                        <input type="file" name="imgservice" placeholder="" value="<?php echo $service['image']; ?>">
                        
                        <br><br>
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

