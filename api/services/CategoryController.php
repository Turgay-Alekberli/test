<?php 
//Контроллер api категорий
//подключение настроек eloquent
require 'bootstrap.php';
//подключение модели категория
include_once './models/Category.php';

//список категорий
function getCategories()
{
    http_response_code(200);
    echo json_encode(Category::get()->toArray());
}

//получение категории по его id
function getCategoryById($id)
{
    http_response_code(200);
    echo json_encode(Category::find($id));
}

//сохранение категории
function storeCategory($parameters)
{
    $errors = [];
    $data = [];

    // parent id field
    (isset($parameters['parent_id'])) 
        ? $data['parent_id'] = validate($parameters['parent_id']) 
        : $errors[] = 'Parent id is empty';

    // name field
    (isset($parameters['name'])) 
        ? $data['name'] = validate($parameters['name']) 
        : $errors[] = 'Name is empty';

    if (count($errors) > 0) {
        http_response_code(422);
        echo json_encode($errors);
    } else {
        $result = Category::create($data);

        if ($result) {
            http_response_code(200);
            echo json_encode('Category saved successfully');
        } else {
            http_response_code(500);
            echo json_encode('Something get wrong');
        }
    }
}

//редактирование категории
function updateCategory($id)
{
    if ($id <= 0 || empty($id)) {
        http_response_code(422);
        echo json_encode('Category id is not defined');
    }

    echo json_encode('update not working');
}

//удаление категории
function deleteCategory($id)
{
    if ($id <= 0 || empty($id)) {
        http_response_code(422);
        echo json_encode('Category id is not defined');
    } else {
        try {
            $res = Category::findOrFail($id)->delete();

            if ($res) {
                http_response_code(200);
                echo json_encode('Category was deleted');
            } else {
                http_response_code(500);
                echo json_encode('Error during deleting');
            }
        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode('Server error');
        }
    }
}

?>