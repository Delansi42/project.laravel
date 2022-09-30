<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';


if(!isset($_GET['id'])){
    throw new Error('not found');
}

$category = \Tests\Model\Category::find($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $category->title = $_POST['title'];
    $category->slug = $_POST['slug'];
    $category->save();
    header('Location: index-category.php');
}

/** @var $blade */

echo $blade->make('category/update-category', compact('category'))->render();