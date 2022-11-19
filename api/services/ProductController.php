<?php 
//Контроллер api продуктов
//подключение настроек eloquent
require 'bootstrap.php';
//подключение модели продукт
include_once './models/Product.php';

//список продуктов в формате json
function getProducts()
{
    http_response_code(200); //ok
    echo json_encode(Product::get()->toArray());
}

//продукт по его id
function getProductById($id)
{
    http_response_code(200); //ok
    echo json_encode(Product::find($id));
}

//сохранение продукта
function storeProduct($parameters)
{
    $errors = [];
    $data = [];

    // category id field
    (isset($parameters['category_id'])) 
        ? $data['category_id'] = validate($parameters['category_id']) 
        : $errors[] = 'Category id is empty';

    // name field
    (isset($parameters['name'])) 
        ? $data['name'] = validate($parameters['name']) 
        : $errors[] = 'Name is empty';

    // description field
    (isset($parameters['description'])) 
        ? $data['description'] = validate($parameters['description']) 
        : $errors[] = 'Description is empty';
    
    // price field
    (isset($parameters['price'])) 
        ? $data['price'] = validate($parameters['price']) 
        : $errors[] = 'Price is empty';

    // image field
    (!empty($parameters['image'])) 
        ? $data['image'] = validate($parameters['image']) 
        : '';

    // status field
    (isset($parameters['status'])) 
        ? $data['status'] = validate($parameters['status']) 
        : $errors[] = 'Status is empty';

    if (count($errors) > 0) {
        http_response_code(422); // Unprocessable Entity
        echo json_encode($errors);
    } else {
        $result = Product::create($data);

        if ($result) {
            http_response_code(200); //ok
            echo json_encode('Product saved successfully');
        } else {
            http_response_code(500); //server error
            echo json_encode('Something get wrong');
        }
    }
}

//редактирование продукта
function updateProduct($id)
{
    if ($id <= 0 || empty($id)) {
        http_response_code(422);
        echo json_encode('Product id is not defined');
    }

    echo json_encode('update not working');
}

//удаление продукта
function deleteProduct($id)
{
    if ($id <= 0 || empty($id)) {
        http_response_code(422); // Unprocessable Entity
        echo json_encode('Product id is not defined');
    } else {
        try {
            $res = Product::find($id)->delete();

            if ($res) {
                http_response_code(200);
                echo json_encode('Product was deleted');
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