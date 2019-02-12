<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление услугами</li>
                </ol>
            </div>

            <a href="/admin/service/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить услугу</a>
            
            <h4 class="admin-text-color">Список услуг</h4>

            <br/>

            <table class="table-bordered table-striped table table-background">
                <tr>
                    <th>ID услуги</th>
                    <th>Название услуги</th>
					<th>Описание</th>
                    <th>Порядковый номер</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($servicesList as $service): ?>
                    <tr>
                        <td><?php echo $service['id']; ?></td>
                        <td><?php echo $service['name']; ?></td>
						<td><?php echo $service['description']; ?></td>
                        <td><?php echo $service['sort_order']; ?></td>
                        <td><a href="/admin/service/update/<?php echo $service['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/service/delete/<?php echo $service['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

