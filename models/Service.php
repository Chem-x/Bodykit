<?php

/**
 * Класс service - модель для работы с услугами
 */
class Service
{

    /**
     * Возвращает массив услуг для списка на сайте
     * @return array <p>Массив с услугами</p>
     */
    public static function getServicesList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, name FROM service ORDER BY sort_order, name ASC');

        // Получение и возврат результатов
        $i = 0;
        $serviceList = array();
        while ($row = $result->fetch()) {
            $serviceList[$i]['id'] = $row['id'];
            $serviceList[$i]['name'] = $row['name'];
            $i++;
        }
        return $serviceList;
    }

    /**
     * Возвращает массив услуг для списка в админпанели <br/>
     * @return array <p>Массив услуг</p>
     */
    public static function getServicesListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, name, description, sort_order FROM service ORDER BY sort_order ASC');

        // Получение и возврат результатов
        $serviceList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $serviceList[$i]['id'] = $row['id'];
            $serviceList[$i]['name'] = $row['name'];
			$serviceList[$i]['description'] = $row['description'];
            $serviceList[$i]['sort_order'] = $row['sort_order'];
            $i++;
        }
        return $serviceList;
    }

    /**
     * Удаляет услугу с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteServiceById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM service WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Редактирование услуги с заданным id
     * @param integer $id <p>id услуги</p>
     * @param string $name <p>Название</p>
	 * @param text $description <p>Описание</p>
     * @param integer $sortOrder <p>Порядковый номер</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateServiceById($id, $name, $description, $sortOrder)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE service
            SET 
                name = :name,
				description = :description,
                sort_order = :sort_order
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':description', $description, PDO::PARAM_INT);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Возвращает услугу с указанным id
     * @param integer $id <p>id услуги</p>
     * @return array <p>Массив с информацией о услуге</p>
     */
    public static function getServiceById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM service WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }

    /**
     * Добавляет новую услугу
     * @param string $name <p>Название</p>
	 * @param text $description <p>Описание</p>
     * @param integer $sortOrder <p>Порядковый номер</p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createService($name, $description, $sortOrder)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO service (name, description, sort_order)'
                . 'VALUES (:name, :description, :sort_order)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':description', $description, PDO::PARAM_INT);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
		if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
		return 0;
        //return $result->execute();
    }
	public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с услугами
        $path = '/upload/images/service/';

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для услуги существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

}
