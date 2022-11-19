<?php
//Контроллер api для миграции таблиц базы данных
//подключение настроек eloquent
require 'bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;

function create_category_table()
{
    Capsule::schema()->create('api_category', function ($table) {
        $table->increments('id');
        $table->integer('parent_id');
        $table->string('name', 30);
    });
}

function create_product_table()
{
    Capsule::schema()->create('api_product', function ($table) {
        $table->increments('id');
        $table->integer('category_id');
        $table->string('name', 50);
        $table->text('description');
        $table->float('price');
        $table->string('image')->nullable();
        $table->tinyInteger('status');
    });
}

?>