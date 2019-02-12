<?php

/**
 * Контроллер AdminServiceController
 * Управление категориями товаров в админпанели
 */
class AdminServiceController extends AdminBase
{

    /**
     * Action для страницы "Управление услугами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $servicesList = Service::getServicesListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_service/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить услугу"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
			$description = $_POST['description'];
            $sortOrder = $_POST['sort_order'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую услугу
                $id = Service::createService($name, $description, $sortOrder);
				// Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["imgservice"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["imgservice"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/service/{$id}.jpg");
                    }
                };
                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/service");
            }
        }

        require_once(ROOT . '/views/admin_service/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать услугу"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной услуги
        $service = Service::getServiceById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $name = $_POST['name'];
			$description = $_POST['description'];
            $sortOrder = $_POST['sort_order'];

            // Сохраняем изменения
           if (Service::updateServiceById($id, $name, $description, $sortOrder)) {
			   // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["imgservice"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["imgservice"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/service/{$id}.jpg");
                }
		   }

            // Перенаправляем пользователя на страницу управлениями услугами
            header("Location: /admin/service");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_service/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить услугу"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем услугу
            Service::deleteServiceById($id);

            // Перенаправляем пользователя на страницу управлениями услугами
            header("Location: /admin/service");
        }


        // Подключаем вид
        require_once(ROOT . '/views/admin_service/delete.php');
        return true;
    }

}
