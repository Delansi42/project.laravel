<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tag = new \Tests\Model\Category();
    $tag->title = $_POST['title'];
    $tag->slug = $_POST['slug'];
    $tag->save();
    header('Location: index-category.php');
}

/** @var $blade */

echo $blade->make('category/create-category')->render();