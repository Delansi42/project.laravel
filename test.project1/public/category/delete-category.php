<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';


if(!isset($_GET['id'])){
    throw new Error('not found');
}

$category = \Tests\Model\Category::find($_GET['id']);
$posts = $category->posts;
foreach ($posts as $post){
    $post->delete();
}
$category->delete();
header('Location: index-category.php');