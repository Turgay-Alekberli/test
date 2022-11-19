<?php 

include_once 'functions.php';
include_once './services/ProductController.php';
include_once './services/CategoryController.php';
include_once './services/MigrationController.php';

$method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];
$url = rtrim($request_uri, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

$controllerName = ucfirst($url[2]);
$id = !empty($url[3]) ? $url[3] : false;

if ($controllerName != 'Product' && $controllerName != 'Category' && $controllerName != 'Migration') {
    header("Location: /");
    die;
}

//rest api для продуктов
if ($controllerName == 'Product') {
    header('Content-Type: application/json; charset=utf-8');

    $methodName = strtolower($method);

    switch ($methodName) {
        case 'get':
            ($id) ? getProductById($id) : getProducts();
            break;

        case 'post':
            storeProduct($_POST);
            break;

        case 'put':
            updateProduct($id);
            break;

        case 'delete':
            deleteProduct($id);
            break;
        
        default:
            http_response_code(405);
            echo json_encode('Method not allowed');
            break;
    }
} 

//rest api для категорий
if ($controllerName == 'Category') {
    header('Content-Type: application/json; charset=utf-8');

    $methodName = strtolower($method);

    switch ($methodName) {
        case 'get':
            ($id) ? getCategoryById($id) : getCategories();
            break;

        case 'post':
            storeCategory($_POST);
            break;

        case 'put':
            updateCategory($id);
            break;

        case 'delete':
            deleteCategory($id);
            break;
        
        default:
            http_response_code(405);
            echo json_encode('Method not allowed');
            break;
    }
} 

//rest api для миграций таблиц
if ($controllerName == 'Migration') {
    switch ($id) {
        case 'category':
            create_category_table();
            break;

        case 'product':
            create_product_table();
            break;
        
        default:
            create_category_table();
            break;
    }
}

?>